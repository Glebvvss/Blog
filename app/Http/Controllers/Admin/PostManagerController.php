<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Eloquent\Post;
use Auth;

class PostManagerController extends Controller {
    
	public function getManager() {
		$countPosts = Post::get()->count();
		$posts = Post::orderBy('id', 'desc')->take(10)->get();
		return view('admin.index-components.posts', [
			'countPosts' => $countPosts,
			'posts' => $posts
		]);
	}

	public function pagination(Request $request) {
		if ( $request->pageNumber != 1 ) {
			$skipRows = $request->pageNumber * 10 - 10;
		} else {
			$skipRows = 0;
		}
		$posts = Post::orderBy('id', 'desc')->skip($skipRows)->take(3)->get();
		return view('admin.index-components.list-of-posts', [
			'posts' => $posts
		]);
	}

	public function getPost(Request $request) {
		$post = Post::find($request->idPost);
		return response()->json([
			'id' => $post->id,
			'title' => $post->title,
			'subTitle' => $post->sub_title,
			'post' => $post->post,
		]);
	}

    public function add(Request $request) {
    	$post = new Post();
    	$post->title = $request->title;
    	$post->sub_title = $request->subTitle;
    	$post->post = $request->post;
    	$post->user_id = Auth::user()->id;
    	$post->date_post = date('Y-m-d');
    	$post->save();
    }

    public function update(Request $request) {
    	$post = Post::findOrFail($request->id);
    	$post->title = $request->title;
    	$post->sub_title = $request->subTitle;
    	$post->post = $request->post;
    	$post->save();
    }

	public function drop(Request $request) {
		$post = Post::findOrfail($request->id);
		$post->delete();
	}

}
