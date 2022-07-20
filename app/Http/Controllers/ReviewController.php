<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {

        $reviews = Review::with('users', 'tags')->get();
        return view('admin.review.index', ['reviews' => $reviews]);
    }

    public function create()
    {
        $tags = Tag::all();

        return view('admin.review.create', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'rumah_sakit' => 'required',
            'tanggal_vaksin' => 'required',
            'jenis_vaksin' => 'required',
            'kuota' => 'required',
            'url_rs' => 'required',
            'review' => 'required',
            'tags' => 'required',
            'rating' => 'required',
        ]);
        $input = $request->all();
        $review = new Review();

        $review->rumah_sakit = $input['rumah_sakit'];
        $review->tanggal_vaksin = $input['tanggal_vaksin'];
        $review->jenis_vaksin = $input['jenis_vaksin'];
        $review->kuota = $input['kuota'];
        $review->url_rs = $input['url_rs'];
        $review->review = $input['review'];
        $review->rating = $input['rating'];
        $review->user_id = Auth::user()->id;

        $review->save();

        foreach ($input['tags'] as $tag) {
            $review->tags()->attach($tag);
        }

        return redirect(route('review_index'));
    }

    public function edit($id){
        $review = Review::find($id);
        $tags = Tag::all();
        return view ('admin.review.edit', compact('review','id','tags'));
    }

    public function update(Request $request, $id){
        $this-> validate($request,[
            'rumah_sakit' => 'required',
            'tanggal_vaksin' => 'required',
            'jenis_vaksin' => 'required',
            'kuota' => 'required',
            'url_rs' => 'required',
            'review' => 'required',
            'tags' => 'required',
            'rating' => 'required',
        ]);

        $review = Review::find($id);
        $review -> rumah_sakit = request('rumah_sakit');
        $review -> tanggal_vaksin = request('tanggal_vaksin');
        $review -> jenis_vaksin = request('jenis_vaksin');
        $review -> kuota = request('kuota');
        $review -> url_rs = request('url_rs');
        $review -> review = request('review');
        $review -> rating = request('rating');
        $review -> save();

        if(empty(request('tags'))){
            $review->tags()->detach();
        }else{
            $review->tags()-> sync(request('tags'));
        }

        return redirect(route('review_index', $id));
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->tags()->detach();
        $review->delete();
        return redirect(route('review_index'));
    }



}
