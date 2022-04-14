<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PaketWisataController extends Controller
{
    public function allPaketWisata()
    {
        $data = PaketWisata::all();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Paket Wisata successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No Paket Wisata found'
            ], 400);
        }
    }

    public function paketWisataByID($id)
    {
        try {
            $data = PaketWisata::FindOrFail($id);
            if ($data) {
                return response()->json([
                    'status' => true,
                    'message' => 'Paket Wisata successfully fetched!',
                    'data' => $data
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'No Paket Wisata found'
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error, please contact administrator!',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function create(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_paket' => 'required',
            'destinasi_wisata' => 'required',
            'deskripsi' => 'required',
            'photo_wisata' => 'required',
            'harga' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error on validation!',
                'errors' => $validator->errors()
            ], 422);
        }
        $data = PaketWisata::create($req->toArray());

        return response()->json([
            'success' => true,
            'message' => 'Create paket wisata success!',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nama_paket', 'destinasi_wisata', 'deskripsi', 'photo_wisata', 'harga']);
        try {
            $res = PaketWisata::find($id);
            $res->update($data);
            return response()->json([
                'success' => true,
                'message' => 'Update success!',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Update error!',
                'errors' => $e->getMessage()

            ], 422);
        }
    }

    public function delete($id)
    {
        try {
            $data = PaketWisata::findOrFail($id);
            $data->delete();
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
}
