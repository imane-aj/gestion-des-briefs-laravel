<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $promotions = Promotion::all(); 
        return view("promotion.index", ['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("promotion.add");
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
        $promotion = Promotion::create([
            "name"  => $request->name,
            'token' => Str::random()
        ]);
        return redirect()->route('promotion.index');
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
    public function edit($token)
    {
        //
        $promotion = Promotion::where('token', $token)->firstOrFail();
        $students  = $promotion->students;
        return view('promotion.edit', [
            'promotion' => $promotion,
            'students'  => $students
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $token)
    {
        //
        $promotion = Promotion::where('token', $token)->firstOrFail();
        $promotion->update([
            "name" => $request->name,
            "token" => Str::random()
        ]);
        return redirect()->route('promotion.edit', $promotion->token);
    }

    /**
     * Remove the specified resource from storage.f
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($token)
    {
        //
        $promotion = Promotion::where('token', $token)->firstOrFail();
        $promotion->delete();
        return back();
    }
}
