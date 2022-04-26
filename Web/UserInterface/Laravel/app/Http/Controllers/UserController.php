<?php

namespace App\Http\Controllers;

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
        if ($validatedData['password_new'] != null)
        {
            $validatedData['password'] = bcrypt($validatedData['password_new']);
        }
        
        $fullPath = $validatedData['profile_picture']->store('images/profile_pictures');
        $validatedData['profile_picture'] = $fullPath;

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

    public function AcceptInvitation(Request $request)
    {
        $receiverUser = $request->session()->get('user');
        $receiverUser->ReceivedRequests()->detach($request->senderUserID);
        $receiverUser->Friendships1()->syncWithoutDetaching($request->senderUserID);
        $request->session()->flash('success', 'Barát kérelem elfogadva!');
        return redirect()->back();
    }
    public function RejectInvitation(Request $request)
    {
        $receiverUser = $request->session()->get('user');
        $receiverUser->ReceivedRequests()->detach($request->senderUserID);
        $request->session()->flash('success', 'Barát kérelem elutasítva!');
        return redirect()->back();
    }

    public function DeleteFriend(Request $request)
    {
        $user = $request->session()->get('user');
        $user->Friendships1()->detach($request->friendID);
        $user->Friendships2()->detach($request->friendID);
        return redirect()->back()->with('success', 'Törölve!');
    }
    public function InviteFriend(Request $request)
    {
        $user = $request->session()->get('user');
        $user->SentRequests()->attach($request->userID);
        return redirect()->back()->with('success', 'Bejelölve!');
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
}
