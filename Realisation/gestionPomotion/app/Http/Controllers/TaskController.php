<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Task;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($token)
    {
        //
        $brief = Brief::where('token', $token)->firstOrFail();
        return view('tasks.add', ['brief' => $brief]);
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
        $tache = Task::create([
            'name'       => $request->name,
            'startDate'  => $request->startDate,
            'endDate'    => $request->endDate,
            'brief_id' => $request->brief_id 
        ]);
        return redirect()->route('brief.index')->with(['true' => 'La tâche à été ajoutée avec succée']);
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
        $task = Task::findOrFail($id);
        return view('tasks.edit', ['task' => $task]);
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
        $task = Task::findOrFail($id);
        $task->update([
            'name' => $request->name,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'brief_id' => $request->brief_id
        ]);
        return redirect()->route('brief.edit', $task->brief->token)
        ->with(['true' => 'La tâche à été modifiée avec succée']);
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
        $tache = Task::findOrFail($id);
        $tache->delete();  
        return back();  
    }
}
