<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api' , [
            'except' => ['login']
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'code' => 200,
                'status' => 'error',
                'message' => 'Login Failed'
            ]);
        }


        return response()->json([
            'status' => 'success',
            'message' => 'Logged in successfully!',
            'token' => $token,
        ]);
    }

    public function index()
    {
        // $data = inventory::latest()->paginate(10);

        // return new
        try {
            $data = inventory::latest()->paginate(10);
            return response()->json([
                'status' => 200,
                'message' =>  "Data Retrieved Successfully",
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 500,
                'message' => 'Internal Error',
                'data'    => []
            ]);
        }
    }
}
