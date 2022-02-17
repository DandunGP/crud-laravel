<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function create(Request $request)
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

        return response()->json(
            [
                'message' => 'Student berhasil ditambahkan'
            ],
            200
        );
    }

    public function index(Request $request, Student $student)
    {
        $all = $student->all();
        if ($all->count() > 0) {
            // $result = $result->where('gender', "L");
            return ResponseFormatter::success([
                'list' => $all,
            ], 'Success get Student');
        } else {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
            ], "Data Student Not Found");
        }
    }

    public function edit($id)
    {
        $student = Student::find($id);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $request->validate([
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'kelas' => 'required',
            'extra' => 'required'
        ]);

        $student->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'classroom_id' => $request->kelas,
            'extra_id' => $request->extra
        ]);

        return response()->json(
            [
                'message' => 'Student berhasil diubah'
            ],
            200
        );
    }

    public function destroy($id)
    {
        $student = Student::find($id)->delete();

        return response()->json(
            [
                'message' => 'Student berhasil dihapus'
            ],
            200
        );
    }
}
