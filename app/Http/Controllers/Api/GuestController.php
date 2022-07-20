<?php

namespace App\Http\Controllers\Api;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
