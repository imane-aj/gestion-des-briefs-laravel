<?php

namespace App\Http\Controllers;

use App\Http\Requests\TacheRequest;
use App\Models\Brief;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
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
        return view('taches.add', ['brief' => $brief]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TacheRequest $request)
    {
        //
        $tache = Tache::create([
            'name'       => $request->name,
            'startDate'  => $request->startDate,
            'endDate'    => $request->endDate,
            'briefToken' => $request->briefToken 
        ]);
        return redirect()->route('brief.index');
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
        $tache = Tache::findOrFail($id);
        return view('taches.edit', ['tache' => $tache]);
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
        $tache = Tache::findOrFail($id);
        $tache->update([
            'name' => $request->name,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'briefToken' => $request->briefToken
        ]);
        return redirect()->route('brief.edit', $tache->briefToken);
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
        $tache = Tache::findOrFail($id);
        $tache->delete();  
        return back();  
    }
}
