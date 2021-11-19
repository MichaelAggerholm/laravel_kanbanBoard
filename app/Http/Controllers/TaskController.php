<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backlogTasks       = DB::select("select * from tasks where kanbanList like 'backlog'");
        $inProgressTasks    = DB::select("select * from tasks where kanbanList like 'inProgress'");
        $testingTasks       = DB::select("select * from tasks where kanbanList like 'testing'");
        $doneTasks          = DB::select("select * from tasks where kanbanList like 'done'");
        return view('kanban.index', [
                'backlogTasks'=>$backlogTasks,
                'inProgressTasks'=>$inProgressTasks,
                'testingTasks'=>$testingTasks,
                'doneTasks'=>$doneTasks,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Task $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $tasks)
    {
        //
    }
}
