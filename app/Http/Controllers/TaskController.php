<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return[
            new Middleware('auth:sanctum'),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $count = Task::count();
        // $tasks = Task::where('user_id',Auth::id())->latest()->get();
        return Task::where('user_id',Auth::id())->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $task = $request->user()->tasks()->create($fields);
        return ['task' => $task,'message'=>'Task successfully created'];
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        Gate::authorize('modify', $task);
        $fields = $request->validate([
            'title' => 'sometimes|required|max:255',
            'body' => 'sometimes|required',
            'status' => 'sometimes|required|boolean'
        ]);

        $task->update($fields);
        return ['task' => $task,'message' => 'Task updated'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('modify', $task);
        $task->delete();
        return ['message' => 'Task deleted'];
    }
}
