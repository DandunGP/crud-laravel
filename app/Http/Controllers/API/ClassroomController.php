<?php

namespace App\Http\Controllers\API;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
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
}
