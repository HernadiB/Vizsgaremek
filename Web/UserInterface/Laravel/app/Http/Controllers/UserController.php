<?php

namespace App\Http\Controllers;

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

    public function GetTeamMembers($teamid)
    {
        $users = User::where('team_id', $teamid)->get();
        return $users;
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
