<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
        ]);

        Extracurricular::create([
            'nama_extra' => $request->nama,
        ]);

        return response()->json(
            [
                'message' => 'Extracurricular berhasil ditambahkan'
            ],
            200
        );
    }

    public function index(Request $request, Extracurricular $extra)
    {
        $all = $extra->all();
        if ($all->count() > 0) {
            // $result = $result->where('gender', "L");
            return ResponseFormatter::success([
                'list' => $all,
            ], 'Success get Extracurricular');
        } else {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
            ], "Data Extracurricular Not Found");
        }
    }

    public function edit($id)
    {
        $extra = Extracurricular::find($id);
    }

    public function update(Request $request, $id)
    {
        $extra = Extracurricular::find($id);

        $request->validate([
            'nama' => 'required|max:50',
        ]);

        $extra->update([
            'nama_extra' => $request->nama,
        ]);

        return response()->json(
            [
                'message' => 'Extracurricular berhasil diubah'
            ],
            200
        );
    }

    public function destroy($id)
    {
        $extra = Extracurricular::find($id)->delete();

        return response()->json(
            [
                'message' => 'Extracurricular berhasil dihapus'
            ],
            200
        );
    }
}
