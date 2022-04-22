<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);
        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TaskResource(Task::findorfail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $data = $request->validated();
        $task = Task::findorfail($id);
        $task->update($data);
        return new TaskResource($task);
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

    public function GetUsers($taskid)
    {
        $task = Task::findorfail($taskid);
        return $task->Users;
    }
    public function AcceptTask(Request $request)
    {
        $user = $request->session()->get('user');
        $user->ActualTasks()->attach($request->taskID);
        return redirect()->back()->with('success', 'Elvállalva!');
    }
    public function FinishTask(Request $request)
    {
        $user = $request->session()->get('user');
        $user->ActualTasks()->updateExistingPivot($request->taskID, ['status' => 'underReview']);
        return redirect()->back()->with('success', 'Feladat leadva!');
    }
    public function ConfirmTask(Request $request)
    {
        $userID = explode('.', $request->userAndTaskID)[0];
        $taskID = explode('.', $request->userAndTaskID)[1];
        $user = User::findorfail($userID);
        $user->ActualTasks()->updateExistingPivot($taskID, ['status' => 'finished']);
        return redirect()->back()->with('success', 'Elfogadva!');
    }
    public function RejectTask(Request $request)
    {
        $userID = explode('.', $request->userAndTaskID)[0];
        $taskID = explode('.', $request->userAndTaskID)[1];
        $user = User::findorfail($userID);
        $user->ActualTasks()->updateExistingPivot($taskID, ['status' => 'unfinished']);
        return redirect()->back()->with('success', 'Elutasítva!');
    }
    public function ViewTask(Request $request)
    {
        return redirect()->route('site.levels')->with('taskID', $request->taskID);
    }
}
