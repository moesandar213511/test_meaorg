<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function blog(){
        return view('admin.site_admin.admin.blog')->with([
            'url' => 'blog'
        ]);
    }
}
