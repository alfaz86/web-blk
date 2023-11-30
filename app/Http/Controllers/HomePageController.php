<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\News;
use App\Models\Video;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function homePage()
    {
        $helper = new Helper();
        $latestVideos = Video::orderBy('created_at', 'desc')->limit(6)->get();
        $latestNews = News::orderBy('created_at', 'desc')->limit(4)->get();
        return view('index', compact('helper', 'latestVideos', 'latestNews'));
    }

    public function contactPage()
    {
        return view('contact');
    }
}
