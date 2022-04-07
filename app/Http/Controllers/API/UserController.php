<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allUser()
    {
        $data = User::all();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $validasi= $request ->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        try {
            $response = User::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()

            ],422);
        }
    }

    public function UserByID($id)
    {
        $user =  User::find($id);
        return response()->json($user);
    }


    public function update(Request $request, $id)
    {
        $validasi= $request ->validate([
            'nama' => 'required',
            'email' => '',
            'password' => 'required'
        ]);
        try {
            $response = User::find($id);

            $response -> update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()

            ],422);
        }
    }


    public function delete($id)
    {
        try {
            $user =  User::find($id);
            $user -> delete();
            return response()->json([
                'success' => true,
                'message' => 'Success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ],422);
        }
    }


}
