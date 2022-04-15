<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    //
    public function createTransaction(Request $request, $id_paket_wisata)
    {
        $validator = Validator::make($request->all(), [
            'metode' => 'required',
            'pax' => 'required',

        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        // Get Harga Paket Wisata
        $paket_wisata = PaketWisata::findOrFail($id_paket_wisata)->first();

        $data = Transaction::create([
            'id_user' => auth()->user()->id,
            'id_paket_wisata' => $id_paket_wisata,
            'metode' => $request->metode,
            'pax' => $request->pax,
            'total' => $paket_wisata->harga * $request->pax,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction success!',
            'data' => $data
        ], 201);
    }

    public function allTransaction()
    {
        $data = DB::table('transaksi')
            ->join('users', 'transaksi.id_user', '=', 'users.id')
            ->join('paket_wisata', 'transaksi.id_paket_wisata', '=', 'paket_wisata.id')
            ->select('transaksi.id', 'users.nama', 'paket_wisata.nama_paket', 'transaksi.metode', 'transaksi.pax', 'paket_wisata.harga', 'transaksi.total', 'transaksi.status')
            ->get();

        if (!$data->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Transaction successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No transaction found'
            ], 400);
        }
    }


    public function historyTransaction()
    {
        $data = DB::table('transaksi')
            ->join('users', 'transaksi.id_user', '=', 'users.id')
            ->join('paket_wisata', 'transaksi.id_paket_wisata', '=', 'paket_wisata.id')
            ->select('paket_wisata.nama_paket', 'transaksi.metode', 'transaksi.pax', 'paket_wisata.harga', 'transaksi.total', 'transaksi.status')
            ->where('transaksi.id_user', '=', auth()->user()->id)
            ->get();

        if (!$data->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Transaction successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No transaction found'
            ], 400);
        }
    }

    public function acceptTransaction($id)
    {
        try {
            $data = Transaction::findOrFail($id);
            $data->update([
                'status' => 'Accepted'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Transaction status has been accept!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Accept transaction error!',
                'errors' => $e->getMessage()
            ], 422);
        }
    }
    public function rejectTransaction($id)
    {
        try {
            $data = Transaction::find($id);
            $data->update([
                'status' => 'Rejected'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Transaction status has been rejected!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Reject transaction error!',
                'errors' => $e->getMessage()
            ], 422);
        }
    }
}
