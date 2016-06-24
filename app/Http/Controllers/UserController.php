<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\User;
use App\Tag;

class UserController extends Controller
{

    public function store(Request $request) {
    	$this->validate($request, [
	        'name' => 'required|max:30',
	    ]);

	    $user = new User;
	    $user->name = $request->name;
	    $user->save();

        $users = User::all();

	    if($request->ajax()) {
	    	return response()->json([
	    		'success' => true,
	    		'content' => view('home.users', ['users' => $users])->render()
	    	]);
	    } else {
	    	return redirect('/');
	    }
    }

    public function relatives(Request $request, User $user) {
    	$relatives = $user->relatives()->get();
    	$users = User::all();
    	$tags = Tag::all();
    	return view('home.relation', [
    		'user' => $user,
    		'relatives' => $relatives,
    		'users' => $users,
    		'tags' => $tags
    	])->render();
    }

    public function createRelative(Request $request, User $user) {
    	if($request->relative == 0 || $request->tag == 0) {
    		return redirect('/')->with('error', 'No relation was provided!'); 
    	}

    	DB::table('tag_user')->insert(
		    ['relative_id' => $request->relative, 'tag_id' => $request->tag, 'user_id' => $user->id]
		);

		return redirect('/')->with('success', 'Relationship added successfully!');
    }
}
