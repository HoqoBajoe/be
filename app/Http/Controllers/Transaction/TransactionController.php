<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
        $review = Transaction::create([
            'id_user' => auth()->user()->id,
            'id_paket_wisata' => $id_paket_wisata,
            'metode' => $request->metode,
            'pax' => $request->pax,
            'total' => $id_paket_wisata->harga * $request->pax,

        ]);

        return response($review, 200);
    }

    public function allTransaction(Request $request)
    {
    }

    public function historyTransaction(Request $request)
    {
    }

    public function acceptTransaction(Request $request, $id)
    {
    }
    public function rejectTransaction(Request $request, $id)
    {
    }
}
