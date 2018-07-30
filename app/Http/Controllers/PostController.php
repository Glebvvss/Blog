<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eloquent\Post;
use DateTime;

class PostController extends Controller {
    
    public function getListOfPostsComponent() {
        $posts = Post::with('user')->orderBy('date_post', 'desc')->get();
        return view('index-components.list-of-posts', [
            'posts' => $posts
        ]);
    }

    public function getMorePosts() {

    }

}
