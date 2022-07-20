<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(){
        $reviews = Review::with('users','tags')->get();
        return view('mainPage', ['reviews' => $reviews]);
    }
}
