<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eloquent\Post;
use App\Http\Requests\ListOfPostsRequest;

class PostController extends Controller {

    public function getPosts(ListOfPostsRequest $request) {
        $posts = Post::with('user')->orderBy('date_post', 'desc')
        						   ->skip($request->firstIdPostPerPage)
        						   ->take($request->countPostsPerPage)
        						   ->get();

        return view('index-components.posts', [
            'posts' => $posts
        ]);
    }

}
