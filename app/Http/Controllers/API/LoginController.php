<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $rules = [
                'username' => ['required'],
                'password' => ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return ResponseFormatter::error([
                    'message' => "Invalid validation",
                    'error' => [
                        'validation' => $validator->errors()
                    ],
                ], 'Something went wrong', 406);
            }

            $credentials = request(['username', 'password']);

            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'error'
                ], 'Autentication Failed', 500);
            }

            $user = User::where('username', $request->username)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception("Invalid Credential");
            }

            $tokenResult = $user->createToken('authToken', ['*'])->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => "Bearer",
                'username' => [
                    'username' => $user->username
                ],
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'error',
                'error' => $error,
            ], 'Autentication Failed', 500);
        }
    }
}
