<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    //
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_paket_wisata' => 'required',
            'stars' => 'required',
            'review' => 'required'

        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $review = Review::create([
            'id_user' => auth()->user()->id,
            'id_paket_wisata' => $request->id_paket_wisata,
            'stars' => $request->stars,
            'review' => $request->review
        ]);

        return response($review, 200);
    }
}
