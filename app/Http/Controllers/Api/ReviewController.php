<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        try {
            $reviews = Review::with('users', 'tags')->get();

            return Response::json([
                'success' => true,
                'message' => 'Data has been get',
                'data' => $reviews
            ], 200);
        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error when trying to list data',
                'error' => $error->getMessage()
            ], 500);
        }

        // return view('admin.review.index', ['reviews' => $reviews]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'review.rumah_sakit'     => 'required|string|max:255',
            'review.tanggal_vaksin' => 'required|string',
            'review.jenis_vaksin'           => 'required|string',
            'review.kuota'           => 'required|string',
            'review.url_rs'               => 'required|string',
            'review.review'            => 'required|string',
            'review.user_id'           => 'nullable|exist:users,id',
            'tags'                     => 'nullable',
            'tags.*'                   => 'required',
            'review.rating'             => 'required',
        ]);
        if ($validator->fails()) {
            return Response::json([
                'success'   => false,
                'message'   => $validator->errors()
            ]);
        }

        try {
            $input = $request->all();
            $input['review']['user_id'] = $request->user('api')->id;
            $insertReview = Review::create($input['review']);

            foreach ($input['tags'] as $tag) {
                $reviews = Review::find($insertReview['id']);
                $reviews->tags()->attach($tag['tag_id']);
            }

            return Response::json([
                'success' => true,
                'message' => 'success create new data',
                'data'    => $insertReview
            ], 200);
        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error when trying to create new data',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $reviews = Review::with('users', 'tags')->findOrFail($request->id);

            return Response::json([
                'success' => true,
                'message' => 'success get data',
                'data' => $reviews
            ], 200);
        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error when get data',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reviews.rumah_sakit'     => 'required|string|max:255',
            'reviews.tanggal_vaksin' => 'required|string',
            'reviews.jenis_vaksin'           => 'required|string',
            'reviews.kuota'           => 'required|string',
            'reviews.url_rs'               => 'required|string',
            'reviews.review'            => 'required|string',
            'reviews.user_id'           => 'nullable|exist:users,id',
            'tags'                     => 'nullable',
            'tags.*'                   => 'required',
            'reviews.rating'             => 'required',
        ]);
        if ($validator->fails()) {
            return Response::json([
                'success'   => false,
                'message'   => $validator->errors()
            ]);
        }
        try {
            $reviews = Review::findOrFail($request->id);
            $input = $request->all();
            $reviews->update($input['reviews']);

            if (count($input['tags']) > 0) {
                $reviews->tags()->detach();
                $reviews->tags()->attach($input['tags']);
            }

            return Response::json([
                'success' => true,
                'message' => 'success update data',
                'data'    => $reviews
            ], 200);
        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error when update data',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $reviews = Review::where('id', $request->id)->first();
            $reviews->tags()->detach();
            $reviews->delete();

            return Response::json([
                'success' => true,
                'message' => 'success delete data',
                'data'    => $reviews
            ], 200);
        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error when delete data',
                'error' => $error->getMessage()
            ], 500);
        }
    }
}
