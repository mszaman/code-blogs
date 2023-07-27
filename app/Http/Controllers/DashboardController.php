<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {

        return view('admin.index')->with([
            'totalUsers' => User::count(),
            'totalPosts' => Post::count(),
            'totalTags' => Tag::count(),
        ]);
    }
}
