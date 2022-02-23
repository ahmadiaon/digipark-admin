<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{

    //* Role User
    public function registerUser(Request $request)
    {
        $request->validate([
            // 'name'         => 'required',
            // 'email'        => 'required|email|unique:users',
            // 'phone_number' => 'required|unique:users',
            // 'password'     => 'required',
        ]);

        DB::beginTransaction();
        try {
            $uuid = Str::uuid()->toString();
            $user = User::create([
                'name'              => $request->name,
                'uuid'              => $uuid,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'phone_number'      => $request->phone_number,
            ]);

            $token = JWTAuth::fromUser($user);

            $meta = [
                'message' => "Register has been success",
                'code'  => 201,
                'status'  => "success"
            ];

            $data = [
                'user'     => $user,
            ];

            $response = [
                'meta'  => $meta,
                'data'  => $data,
                'role'  => 'user',
                'token' => $token
            ];
            DB::commit();
            return response()->json($response, 201);
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'phone_number'      => 'required',
            // 'email'             => 'required',
            'password'          => 'required',
        ]);

        $user = User::where('phone_number', $request->phone_number)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message'   => "Credentials doesn't match",
                'code'      => 401,
                'status'    => "error"
            ], 401);
        }

        $token = JWTAuth::fromUser($user);

        $meta = [
            'message' => "Login user success",
            'code'  => 200,
            'status'  => "success"
        ];

        $data = [
            'user'     => $user,
        ];

        $response = [
            'meta'  => $meta,
            'data'  => $data,
            'role'  => 'user',
            'token' => $token
        ];
        return response()->json($response, 200);
    }

    public function logoutUser()
    {
        auth()->logout();
        return response()->json([
            'message'   => "Logout success",
            'code'      => 200,
            'status'    => "success"
        ], 200);
    }

    //* Role Admin
    public function registerAdmin(Request $request)
    {

        $request->validate([
            // 'name'         => 'required',
            // 'email'        => 'required',
            // 'password'     => 'required',
        ]);

        DB::beginTransaction();
        try {
            $uuid = Str::uuid()->toString();
            $admin = Admin::create([
                'uuid'              => $uuid,
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'phone_number'      => $request->phone_number,
            ]);

            $token = JWTAuth::fromUser($admin);

            $meta = [
                'message' => "Register has been success",
                'code'  => 201,
                'status'  => "success"
            ];

            $data = [
                'admin'     => $admin,
            ];

            $response = [
                'meta'  => $meta,
                'data'  => $data,
                'role'  => 'admin',
                'token' => $token
            ];
            DB::commit();
            return response()->json($response, 201);
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email'             => 'required',
            'password'          => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'message'   => "Credentials doesn't match",
                'code'      => 401,
                'status'    => "error"
            ], 401);
        }

        $token = JWTAuth::fromUser($admin);

        $meta = [
            'message' => "Login admin success",
            'code'  => 200,
            'status'  => "success"
        ];

        $data = [
            'admin'     => $admin,
        ];

        $response = [
            'meta'  => $meta,
            'data'  => $data,
            'role'  => 'admin',
            'token' => $token
        ];
        return response()->json($response, 200);
    }

    public function logoutAdmin()
    {
        auth()->logout();
        return response()->json([
            'message'   => "Logout success",
            'code'      => 200,
            'status'    => "success"
        ], 200);
    }
}
