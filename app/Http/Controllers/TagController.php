<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TagRequest;

use App\Tag;

class TagController extends Controller
{
    public function store(TagRequest $request) {
	    $tag = new Tag;
	    $tag->name = $request->name;
	    $tag->save();

	    $tags = Tag::all();

	    if($request->ajax()) {
	    	return response()->json([
    			'success' => true,
    			'content' => view('home.tags', ['tags' => $tags])->render()
	    	]);
	    } else {
	    	return redirect('/');
	    }
    }

    public function update(TagRequest $request, Tag $tag) {
    	$tag->name = $request->name;
    	$tag->save();

    	if($request->ajax()) {
    		return response()->json([
    			'success' => true,
    			'new' => false,
	    		'tag' => $tag
	    	]);
	    } else {
	    	return redirect('/');
	    }
    }
}
