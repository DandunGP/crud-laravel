<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
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
}
