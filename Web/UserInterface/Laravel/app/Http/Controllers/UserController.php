<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcceptInvitationRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ModifyUserRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\TeamRequest;
use App\Http\Resources\UserResource;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        $data = $request->all();
        $user = User::findorfail($id);
        $user->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->Friendships1()->detach();
        $user->Friendships2()->detach();
        $user->SentRequests()->detach();
        $user->ReceivedRequests()->detach();
        $user->ActualTasks()->detach();
        $user->delete();
    }

    public function SignupUser(SignupRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['role'] = "user";
        $validatedData['level_id'] = 1;
        $validatedData['score'] = 0;
        $validatedData['profile_picture'] = "images/profile_pictures/unknown.jpg";

        $user = User::create($validatedData);

        $request->session()->put("user", $user);

        $request->session()->flash("success", "Sikeres regisztráció!");
        auth()->login($user);

        return redirect()->route("home");
    }

    public function LoginUser(LoginRequest $request)
    {
        $loginData = $request->validated();

        if(!User::all()->contains('email', $loginData['email']))
        {
            return redirect()->back()->with("error", "Az adatbázisban nem található ilyen email!");
        }

        if(!auth()->attempt($loginData))
        {
            return redirect()->route("site.login")->with("error", "Hibás jelszó!");
        }

        $request->session()->regenerateToken();

        $request->session()->put("user", auth()->user());

        $request->session()->flash("success", "Sikeres bejelentkezés!");

        return redirect()->route("home");
    }
    public function ModifyUser(ModifyUserRequest $request)
    {
        $validatedData = $request->validated();
        if(array_key_exists('password_new', $validatedData))
        {
            $validatedData['password'] = bcrypt($validatedData['password_new']);
        }
        if(array_key_exists('profile_picture', $validatedData))
        {
            $fullPath = $validatedData['profile_picture']->store('images/profile_pictures');
            $validatedData['profile_picture'] = $fullPath;
        }

        $user = auth()->user();
        $user->update($validatedData);

        $request->session()->put("user", $user);
        $request->session()->flash("success", "Sikeres módosítás!");
        return redirect()->route('site.profile');
    }
    public function DeleteUser(Request $request)
    {
        $this->destroy($request->session()->get('user.id'));
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('site.signup')->with('success', 'Fiók sikeresen törölve!');
    }
    public function LogoutUser(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('site.login')->with('success', 'Sikeres kijelentkezés!');
    }

    public function AcceptInvitation(AcceptInvitationRequest $request)
    {
        $data = $request->validated();
        $receiverUser = $request->session()->get('user');
        $receiverUser->ReceivedRequests()->detach($data["senderUserID"]);
        $receiverUser->Friendships1()->syncWithoutDetaching($data["senderUserID"]);
        $request->session()->flash('success', 'Barát kérelem elfogadva!');
        return redirect()->back();
    }
    public function RejectInvitation(Request $request)
    {
        $receiverUser = $request->session()->get('user');
        $receiverUser->ReceivedRequests()->detach($request->senderUserID);
        if($receiverUser->UserSettings->block_after_rejection == 1)
        {
            $receiverUser->BlockedPeople()->attach($request->senderUserID);
            $request->session()->flash('success', 'Elutasítva, blokkolva!');
        }
        $request->session()->flash('success', 'Barát kérelem elutasítva!');
        return redirect()->back();
    }

    public function DeleteFriend(Request $request)
    {
        $user = $request->session()->get('user');
        $user->Friendships1()->detach($request->friendID);
        $user->Friendships2()->detach($request->friendID);
        if($user->UserSettings->block_after_delete == 1)
        {
            $user->BlockedPeople()->attach($request->friendID);
            return redirect()->back()->with('success', 'Törölve, blokkolva!');
        }
        return redirect()->back()->with('success', 'Törölve!');
    }
    public function DeleteSentRequest(Request $request)
    {
        $user = $request->session()->get('user');
        $user->SentRequests()->detach($request->personID);
        return redirect()->back()->with('success', 'Törölve!');
    }
    public function ReleaseBlockedUser(Request $request)
    {
        $user = $request->session()->get('user');
        $user->BlockedPeople()->detach($request->personID);
        return redirect()->back()->with('success', 'Feloldva!');
    }
    public function InviteFriend(Request $request, $id)
    {
        $senderUser = User::findorfail($request->session()->get('user.id'));
        $availablePeopleToInvite = $this->GetNonFriends($request);
        if($senderUser->BlockedBy->pluck('id')->contains($id))
        {
            return ["message" => "Ez a felhasználó blokkolt téged!"];
        }
        if ($availablePeopleToInvite->pluck('id')->contains($id))
        {
            $senderUser->SentRequests()->attach($id);
            return ["message" => "Bejelölve!"];
        }
        return ["message" => "Ezt a felhasználót nem tudod bejelölni!"];
    }
    public function GetCountryLeaderboard()
    {
        $usersAll = User::where('role', 'user')->get()->sortByDesc('score');
        $usersTop10 = $usersAll->take(10);
        $rank = 1;
        foreach ($usersTop10 as $user)
        {
            $leaderboardRanks[$rank] = $user;
            $rank++;
        }
        return $leaderboardRanks;
    }
    public function GetNonFriends(Request $request)
    {
        $currentUser = User::findorfail($request->session()->get('user.id'));
        $friends1 = $currentUser->Friendships1;
        $friends2 = $currentUser->Friendships2;

        $users = User::all();
        $sentRequests = $currentUser->SentRequests;
        $receivedRequests = $currentUser->ReceivedRequests;
        $nonFriends = $users->diff($friends1->merge($friends2))->diff($sentRequests)->diff($receivedRequests)->where('id', '!=', $currentUser->id);

        if($request->gender != null)
        {
            $nonFriends = $nonFriends->where('gender', $request->gender);
        }
        if($request->role != null)
        {
            $nonFriends = $nonFriends->where('role', $request->role);
        }
        if($request->team != null)
        {
            $nonFriends = $nonFriends->where('team_id', $request->team);
        }
        if($request->level != null)
        {
            $nonFriends = $nonFriends->where('level_id', $request->level);
        }
        return UserResource::collection($nonFriends);
    }
}
