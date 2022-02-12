<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use App\Models\Extracurricular;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extra = Extracurricular::all();
        $class = Classroom::all();
        return view('student.insert', ['class' => $class, 'extra' => $extra]);
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
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'kelas' => 'required',
            'extra' => 'required'
        ]);

        Student::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'classroom_id' => $request->kelas,
            'extra_id' => $request->extra
        ]);

        return redirect('/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $class = Classroom::all();
        $extra = Extracurricular::all();
        return view('student.edit', ['std' => $student, 'class' => $class, 'extra' => $extra]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $students)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'kelas' => 'required',
            'extra' => 'required'
        ]);

        $students->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'classroom_id' => $request->kelas,
            'extra_id' => $request->extra
        ]);
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/student');
    }
}
