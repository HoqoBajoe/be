<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
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
        $data = DB::table('review')
            ->join('users', 'review.id_user', '=', 'users.id')
            ->join('paket_wisata', 'review.id_paket_wisata', '=', 'paket_wisata.id')
            ->select('review.id', 'users.nama', 'paket_wisata.nama_paket', 'review.stars', 'review.review', 'review.status', 'review.created_at')
            ->orderBy('review.id', 'ASC')
            ->get();
        if (!$data->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Review successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No review found'
            ], 404);
        }
    }

    public function getReviewByPaket($id_paket_wisata)
    {
        $data = DB::table('review')
            ->join('users', 'review.id_user', '=', 'users.id')
            ->join('paket_wisata', 'review.id_paket_wisata', '=', 'paket_wisata.id')
            ->select('review.id', 'users.nama', 'paket_wisata.nama_paket', 'review.stars', 'review.review', 'review.status', 'review.created_at')
            ->where('review.id', '=', $id_paket_wisata)
            ->orderBy('review.id', 'ASC')
            ->get();
        if (!$data->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Review successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No review found'
            ], 404);
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
                'message' => 'Review has been reject!!'
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
