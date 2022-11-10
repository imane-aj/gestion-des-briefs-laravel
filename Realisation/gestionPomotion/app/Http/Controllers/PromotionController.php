<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Requests\PromotionRequest;
use App\Models\Student;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $false = 'Vérifier votre validation ou votre Connection';
    public function index()
    {
        //
        return view('promotion.index');
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
    public function store(PromotionRequest $request)
    {
        //
        $promotion = Promotion::create([
            "name"  => $request->name,
            'token' => Str::random()
        ]);
        
        if($promotion){
            return redirect()->route('promotion.index')->with(['true' => 'La promotion à été ajoutée avec succés']);
        }else{
            return redirect()->back()->with(['false' => 'Y a un problem dans l"ajout']);
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
        // //
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
        $studentPromo  = Student::where('promoToken', $promotion->token)->get();
        return view('promotion.edit', [
            'promotion' => $promotion,
            'studentPromo'  => $studentPromo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request,$token)
    {
        // dd($token);
        $promotion = Promotion::where('token', $token)->first();
        $promotion->update([
            "name" => $request->name,
            "token" => Str::random()
        ]);
        if($promotion){
            return redirect()->route('promotion.edit', $promotion->token)->with(['true' => 'La promotion à été modifié avec succés']);
        }else{
            return back()->with(['false' => "Vérifier votre validation ou votre Connection"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
        $promotion = $promotion->first();
        $promotion->delete();
        return redirect()->route("promotion.index")->with('true', 'La promotion à été supprimée avec succés');
    }
}
