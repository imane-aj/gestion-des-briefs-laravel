<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function create($token){
        return view('student.add', ["token" => $token]);
    }

    public function store(StudentRequest $request){
        // dd('store');
        $student = Student::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'promoToken' => $request->promoToken
        ]);
        return redirect()->route('promotion.edit', $student->promoToken)->with('true', 'L"apprenant à été ajouté avec succés');
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
        
        return redirect()->route('promotion.edit', $student->promoToken)
        ->with('true', 'L"apprenant à été modifié avec succés');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return back()->with('true', 'L"apprenant à été supprimé avec succés');;
    }
}