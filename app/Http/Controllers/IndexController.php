<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Client;
use App\Models\Profile;
use App\Models\Protofolio;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $title      = 'My Portofolio';
        $profile    = Profile::all();
        $portofolio = Protofolio::all();
        $client     = Client::all();
        $blog       = Blog::all();
        return view('home.main', compact('title', 'profile', 'portofolio', 'client', 'blog'));
    }
}
