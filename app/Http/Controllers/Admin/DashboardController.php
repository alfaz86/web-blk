<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\News;
use App\Models\Registration;
use App\Models\User;
use App\Models\Video;
use Backpack\CRUD\app\Http\Controllers\AdminController;
use Backpack\CRUD\app\Library\Widget;

class DashboardController extends AdminController
{
    public function setupDashboard()
    {
        $this->data['total_user'] = User::count();
        $this->data['total_registration'] = Registration::count();

        return $this->dashboard();
    }

    public function homePage()
    {
        $helper = new Helper();
        $latestVideos = Video::orderBy('created_at', 'desc')->limit(6)->get();
        $latestNews = News::orderBy('created_at', 'desc')->limit(4)->get();
        return view('index', compact('helper', 'latestVideos', 'latestNews'));
    }
}
