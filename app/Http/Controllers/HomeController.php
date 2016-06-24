<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Tag;

class HomeController extends Controller
{
    public function index() {
    	$users = User::all();
    	$tags = Tag::all();
    	return view('home.index', ['users' => $users, 'tags' => $tags]);
    }
}
