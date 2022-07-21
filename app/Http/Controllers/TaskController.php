<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Http\Requests\TaskStoreRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::all();

        return response()->json(['tasks' => $tasks], 200);
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
    public function store(TaskStoreRequest $request)
    {
        //
        try {
            Task::create([
                'title' => $request->title,
                'description' => $request->description
            ]);

            return response()->json([
                'message' => 'Task successfully created.'
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!'
            ], 500);
        }
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
        $task = Task::find($id);

        if(!$task) {
            return response()->json([
                'message' => 'Task not found!'
            ], 404);
        }

        return response()->json([
            'task' => $task
        ], 200);
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
    public function update(TaskStoreRequest $request, $id)
    {
        //
        try {
            $task = Task::find($id);

            if(!$task) {
                return response()->json([
                    'message' => 'Task not found!'
                ], 404);
            }

            $task->title = $request->title;
            $task->description = $request->description;

            $task->save();

            return response()->json([
                'message' => 'Task updated successfully!'
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!'
            ], 500);
        }
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
        $task = Task::find($id);

        if(!$task) {
            return response()->json([
                'message' => 'Task not found!'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Post successfully deleted!'
        ], 200);
    }
}
