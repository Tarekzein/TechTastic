<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPagesController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');

    }

    public function posts(){
        return view('admin.posts.show');

    }
}
