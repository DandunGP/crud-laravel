<?php

namespace App\Http\Controllers\API;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
        ]);

        Classroom::create([
            'nama_kelas' => $request->nama
        ]);

        return response()->json(
            [
                'message' => 'Classroom berhasil ditambahkan'
            ],
            200
        );
    }

    public function index(Request $request, Classroom $classroom)
    {
        $all = $classroom->all();
        if ($all->count() > 0) {
            // $result = $result->where('gender', "L");
            return ResponseFormatter::success([
                'list' => $all,
            ], 'Success get Classroom');
        } else {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
            ], "Data Classroom Not Found");
        }
    }

    public function edit($id)
    {
        $classroom = Classroom::find($id);
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);

        $request->validate([
            'nama' => 'required|max:50',
        ]);

        $classroom->update([
            'nama_kelas' => $request->nama,
        ]);

        return response()->json(
            [
                'message' => 'Classroom berhasil diubah'
            ],
            200
        );
    }

    public function destroy($id)
    {
        $classroom = Classroom::find($id)->delete();

        return response()->json(
            [
                'message' => 'Classroom berhasil dihapus'
            ],
            200
        );
    }
}
