<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TeamResource::collection(Team::all());
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
        $team = Team::findorfail($id);
        return new TeamResource($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        $team = Team::findorfail($id);
        $data = $request->validated();
        $team->update($data);
        return new TeamResource($team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function CreateTeam(Request $request)
    {
        $user = auth()->user();
        $teamAttributes['name'] = $request->name;
        $teamAttributes['description'] = $request->description;
        $teamAttributes['leader_id'] = $user->id;
        $team = Team::create($teamAttributes);
        foreach ($request->users as $memberID)
        {
            $member = User::findorfail($memberID);
            $member->Team()->associate($team->id);
            $member->save();
        }
        $user->Team()->associate($team->id);
        $user->role = "admin";
        $user->save();
        return redirect()->route('site.myteam');
    }
    public function DeleteTeam(Request $request)
    {
        $user = auth()->user();
        $team = $user->Team;
        foreach ($team->Members as $member)
        {
            $member->Team()->dissociate();
            $member->save();
        }
        $user->Team()->dissociate();
        $user->role = "user";
        $user->save();
        $team->delete();
        return redirect()->route('home')->with('success', 'Csapat törölve!');
    }
    public function AddMember(Request $request)
    {
        $user = auth()->user();
        $newTeamMember = User::findorfail($request->newTeamMember);
        $newTeamMember->Team()->associate($user->Team->id);
        $newTeamMember->save();
        return redirect()->back()->with('success','Hozzáadva!');
    }
    public function GetTeamMembers($teamid)
    {
        return User::where('team_id', $teamid)->get();
    }
}
