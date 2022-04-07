<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// Things to do :
// - Response format masih salah

class PaketWisataController extends Controller
{
    public function allPaketWisata()
    {
        $paket = PaketWisata::all();
        return response($paket, 200);
    }

    public function paketWisataByID($id)
    {
        try {
            $paket = PaketWisata::FindOrFail($id);
            return response($paket, 200);
        } catch (\Exception $e) {
            return response(['message' => 'Paket Wisata not found!'], 404);
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
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $paket = PaketWisata::create();

        return response($paket, 200);
    }

    public function update(Request $req, $id)
    {
        $validasi = $req->validate([
            'nama_paket' => '',
            'destinasi_wisata' => '',
            'deskripsi' => '',
            'photo_wisata' => '',
            'harga' => ''
        ]);

        try {
            $res = PaketWisata::find($id);
            $res->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'Update success!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
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
            return response(['message' => 'Paket Wisata has been deleted!'], 200);
        } catch (\Exception $e) {
            return response(['message' => 'Something went wrong, Paket Wisata not found'], 404);
        }
    }
}
