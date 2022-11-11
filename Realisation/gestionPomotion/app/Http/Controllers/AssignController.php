<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Promotion;
use App\Models\StudentBrief;
use Illuminate\Http\Request;

class AssignController extends Controller
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
        if (is_null(Brief::find($request->brief_id)->students()->find($request->student_id))) {
            $assign = StudentBrief::create([
                'student_id' => $request->student_id,
                'brief_id' => $request->brief_id,
                'promotion_id' => $request->promotion_id
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //
        $students = Promotion::latest()->first()->students;
        $brief = Brief::where('token', $token)->firstOrFail();
        
        $assigned = array_map(function ($student) {
            return $student['id'];
        }, $brief->students->toArray());

        return view('briefs.assignement', ['brief' => $brief, 'students' => $students, 'assigned' => $assigned]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $brief_id = $request->brief_id;
        StudentBrief::where([['student_id', $id], ['brief_id', $brief_id]])->delete();
        return back();
    }

    public function addAll()
    {
        $students = Promotion::latest()->first()->students;
        // dd(request()->id);
        foreach ($students as $student) {
            if (is_null(Brief::find(request()->id)->students()->find($student->id))) {
                StudentBrief::create([
                    'student_id' => $student->id,
                    'brief_id' => request()->id,
                    'promotion_id' => $student->promotion_id
                ]);
            }
        };
        return back();
    }
}
