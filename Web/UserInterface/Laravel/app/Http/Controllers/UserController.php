<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ModifyUserRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Resources\UserResource;
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
        return User::all();
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
        return $user;
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
        $validatedData['score'] = 0;

        $user = User::create($validatedData);

        $request->session()->put("user", $user);

        $request->session()->flash("success", "Sikeres regisztráció");
        auth()->login($user);

        return redirect()->route("home");
    }

    public function LoginUser(LoginRequest $request)
    {
        $loginData = $request->validated();

        if(!auth()->attempt($loginData))
        {
            return redirect()->route("site.login")->with("error", "Hibás adatok");
        }

        $request->session()->regenerateToken();

        $request->session()->put("user", auth()->user());

        $request->session()->flash("success", "Sikeres bejelentkezés");

        return redirect()->route("home");
    }
    public function ModifyUser(ModifyUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password_new']);

        $user = User::findorfail($request->session()->get('user.id'));
        $user->update($validatedData);

        $request->session()->put("user", $user);
        $request->session()->flash("success", "Sikeres módosítás");
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
        return redirect()->route('site.login')->with('success', 'Kijelentkeztél');
    }

    public function AcceptInvitation(Request $request)
    {
        $receiverUser = $request->session()->get('user');
        $receiverUser->ReceivedRequests()->detach($request->senderUserID);
        $receiverUser->Friendships1()->syncWithoutDetaching($request->senderUserID);
        $request->session()->flash('success', 'Barát kérelem elfogadva');
        return redirect()->back();
    }
    public function RejectInvitation(Request $request)
    {
        $receiverUser = $request->session()->get('user');
        $receiverUser->ReceivedRequests()->detach($request->senderUserID);
        $request->session()->flash('success', 'Barát kérelem elutasítva');
        return redirect()->back();
    }
    public function AcceptTask(Request $request)
    {
        $user = $request->session()->get('user');
        $user->ActualTasks()->attach($request->taskID);
        return redirect()->back()->with('success', 'Elvállalva!');
    }
    public function ViewTask(Request $request)
    {
        return redirect()->route('site.levels')->with('taskID', $request->taskID);
    }
    public function DeleteFriend(Request $request)
    {
        $user = $request->session()->get('user');
        $user->Friendships1()->detach($request->friendID);
        $user->Friendships2()->detach($request->friendID);
        return redirect()->back()->with('success', 'Törölve!');
    }

    public function GetTeamMembers($teamid)
    {
        return User::where('team_id', $teamid)->get();
    }
    public function SentFriendRequests($userid)
    {
        $user = User::findorfail($userid);
        return $user->SentRequests;
    }
    public function ReceivedFriendRequests($userid)
    {
        $user = User::findorfail($userid);
        return $user->ReceivedRequests;
    }
    public function GetTasks($userid)
    {
        $user = User::findorfail($userid);
        return $user->Tasks;
    }
}
