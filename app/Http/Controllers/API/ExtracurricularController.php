<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
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
}
