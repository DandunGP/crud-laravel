<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Storage;

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
        // $students = Student::Classrooms()->get(); //Scope
        return view('student.index', [
            'students' => $students,
            'title' => 'Student'
        ]);
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
        return view('student.insert', [
            'class' => $class,
            'extra' => $extra,
            'title' => 'Student'
        ]);
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
            'extra' => 'required',
            'foto' => 'image|file|max:4000'
        ]);

        $validatedImage = $request->file('foto')->store('student-image');

        Student::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'classroom_id' => $request->kelas,
            'extra_id' => $request->extra,
            'image' => $validatedImage
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
        return view('student.edit', ['std' => $student, 'class' => $class, 'extra' => $extra, 'title' => 'Student']);
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
            'extra' => 'required',
            'foto' => 'image|file|max:4000'
        ]);

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('foto')->store('student-image');
        }

        $validatedData['nama'] = $request->nama;
        $validatedData['alamat'] = $request->alamat;
        $validatedData['classroom_id'] = $request->kelas;
        $validatedData['extra_id'] = $request->extra;

        $students->update($validatedData);

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
        if ($student->image) {
            Storage::delete($student->image);
        }
        $student->delete();
        return redirect('/student');
    }

    public function download(Student $student){
        return $student->image;
    }
}
