<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogDashboardController extends Controller
{
    public function index()
    {
        return view('blog.admin.dashboard');
    }
}
