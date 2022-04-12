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
    public function allUser()
    {
        $query = User::where('role', 'admin')->get();
        return response()->json($query);
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "role" => 'user'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    public function UserByID($id)
    {
        $user =  User::find($id);
        return response()->json($user);
    }

    public function updateUser(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'email' => '',
            'password' => 'required'
        ]);
        try {
            $response = User::find($id);

            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()

            ], 422);
        }
    }

    public function delete($id)
    {
        try {
            $user =  User::find($id);
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
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
            return response()->json($validator->errors());
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "role" => 'admin'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    public function allAdmin()
    {
        $query = User::where('role', 'admin')->get();
        return response()->json($query);
    }
}
