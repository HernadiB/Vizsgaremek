<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
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
        User::destroy($id);
    }

    public function SignupUser(SignupRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['role'] = "user";
        $validatedData['score'] = 0;

        $user = User::create($validatedData);

//        $request->session()->put("user", $user);
//
//        $request->session()->flash("success", "Sikeres regisztráció");
//        auth()->login($user);
//
//        return redirect()->route("site.index");
        return $user;
    }

    public function LoginUser(LoginRequest $request)
    {
        $loginData = $request->validated();

        if(!auth()->attempt($loginData))
        {
//            return redirect()->route("site.login")->with("error", "Hibás adatok");
            return ['message' => 'Hibás adatok'];
        }

//        $request->session()->regenerateToken();
//
//        $request->session()->put("user", auth()->user());
//
//        $request->session()->flash("success", "Sikeres bejelentkezés");
//
//        return redirect()->route("site.index");
        return auth()->user();
    }
    public function ModifyUser(Request $request)
    {
        //
    }
    public function DeleteUser(Request $request)
    {
        //
    }
    public function LogoutUser(Request $request)
    {
        //
    }

    public function GetCountryLeaderboard()
    {
        $users = User::all()->sortByDesc('score')->take(10);
        return UserResource::collection($users);
    }

    public function GetTeamMembers($teamid)
    {
        return User::where('team_id', $teamid)->get();
    }
    public function GetFriends($userid)
    {
        $user = User::findorfail($userid);
        $arr = [];
        array_push($arr, $user->Friendships1);
        array_push($arr, $user->Friendships2);
        return $arr;
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
