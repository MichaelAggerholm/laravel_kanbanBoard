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
        $request->validate([
            'text' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();

            return redirect()->route('tasks.index')
                ->with('success','Task deleted!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    // Move task to backlog
    public function moveToBacklog(Task $task)
    {
        $task->kanbanList = 'backlog';
        $task->update();

        return redirect()->route('tasks.index');
    }

    // Move task to inProgress
    public function moveToInProgress(Task $task)
    {
        $task->kanbanList = 'inProgress';
        $task->update();

        return redirect()->route('tasks.index');
    }

    // Move task to Testing
    public function moveToTesting(Task $task)
    {
        $task->kanbanList = 'testing';
        $task->update();

        return redirect()->route('tasks.index');
    }

    // Move task to Done
    public function moveToDone(Task $task)
    {
        $task->kanbanList = 'done';
        $task->update();

        return redirect()->route('tasks.index');
    }
}
