<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Support\Str;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    //
    public function create($token){
        $promotion = Promotion::where('token', $token)->firstOrFail();
        return view('student.add', ['promotion'=> $promotion]);
    }

    public function store(StudentRequest $request){
        // 
        $student = Student::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'token' => Str::random(),
            'promotion_id' => $request->promotion_id
        ]);
        return redirect()->route('promotion.edit', $student->promotions->token)->with('true', 'L"apprenant à été ajouté avec succés');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit', ['student' => $student]);
    }

    public function update(StudentRequest $request,$id){
        // dd($id);
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
        ]);
        
        return redirect()->route('promotion.edit', $student->promotions->token)
        ->with('true', 'L"apprenant à été modifié avec succés');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return back()->with('true', 'L"apprenant à été supprimé avec succés');;
    }
}