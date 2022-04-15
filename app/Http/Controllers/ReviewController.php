<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    //
    public function addReview(Request $request, $id_paket_wisata)
    {
        $validator = Validator::make($request->all(), [
            'stars' => 'required',
            'review' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $review = Review::create([
            'id_user' => auth()->user()->id,
            'id_paket_wisata' => $id_paket_wisata,
            'stars' => $request->stars,
            'review' => $request->review
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review has been created, please wait admin to accept your review!'
        ], 201);
    }

    public function getAllReview()
    {
        // For Admin
        $data = DB::select('select review.id,review.id_user,paket_wisata.nama_paket,users.nama as nama_user,review.stars,review.review,review.status,review.created_at from ((review inner join users on review.id_user = users.id) inner join paket_wisata on review.id_paket_wisata = paket_wisata.id) ORDER BY review.id;');
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Review successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No review found'
            ], 400);
        }
    }

    public function getReviewByPaket($id_paket_wisata)
    {
        $data = DB::select('select review.id,review.id_user,paket_wisata.nama_paket,users.nama as nama_user,review.stars,review.review,review.status,review.created_at from ((review inner join users on review.id_user = users.id) inner join paket_wisata on review.id_paket_wisata = paket_wisata.id) where paket_wisata.id = ' . $id_paket_wisata . ' and review.status = true');
        if ($data) {
            return response()->json([
                'status' => false,
                'message' => 'Review successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No review found'
            ], 400);
        }
    }

    public function acceptReview($id)
    {
        try {
            $data = Review::find($id);
            $data->update([
                'status' => 'Accepted'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Review has been accept!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Accept review error!',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    public function rejectReview($id)
    {
        try {
            $data = Review::findOrFail($id);
            $data->update([
                'status' => 'Rejected'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Review has been reject/deleted!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, Review not found!',
                'errors' => $e->getMessage()
            ], 409);
        }
    }
}
