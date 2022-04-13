<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // USER
    public function allUser()
    {
        $data = User::where('role', 'user')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'User successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No user found'
            ], 204);
        }
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "role" => 'user'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Register user success!'
        ], 201);
    }

    public function UserByID($id)
    {
        $data =  User::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'User successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No user found'
            ], 204);
        }
    }

    public function updateUser(Request $request, $id)
    {
        if (auth()->user()->id == $id) {
            $data = $request->only(['nama', 'email', 'password']);
            try {
                $response = User::findOrFail($id);
                $response->update($data);
                return response()->json([
                    'success' => true,
                    'message' => 'success',
                    'data' => $response
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Update user error!',
                    'errors' => $e->getMessage()
                ], 422);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized, you cannot update other user!'
            ], 401);
        }
    }

    public function delete($id)
    {
        try {
            $user =  User::findOrFail($id);
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Err',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    // ADMIN
    public function createAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "role" => 'admin'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Register user success!'
        ], 201);
    }

    public function allAdmin()
    {
        $data = User::where('role', 'admin')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Admin successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No admin found'
            ], 204);
        }
    }
}
