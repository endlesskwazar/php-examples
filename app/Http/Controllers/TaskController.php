<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use Auth;
use Carbon\Carbon;
use App\Notifications\TaskCreated;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('owner_id', Auth::user()->id)->orWhere('executor_id', Auth::user()->id)->get();
        $notifications = Auth::user()->unreadNotifications->all();
        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }
        return view('tasks/index', [
            'tasks' => $tasks,
            'notifications' => $notifications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allUsers = User::all();
        return view('tasks/create', [
            'users' => $allUsers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->input('title'),
            'due_date' => Carbon::parse($request->input('due_date')),
            'owner_id' => Auth::user()->id,
            'executor_id' => $request->input('executor')
        ]);

        $user = User::find($request->input('executor'));
        $user->notify(new TaskCreated($task));

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
