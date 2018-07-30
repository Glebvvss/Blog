<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eloquent\User;
use App\Models\Eloquent\Post;
use Datetime;
use DB;
use App\Models\TemplateVarsByPage;

class PagesController extends Controller {

    public function indexPage() {
        $vars = new TemplateVarsByPage('index');
        return view('index', [
            'title'          => $vars->templateVar('title'),
            'caption'        => $vars->templateVar('caption_page'),
            'description'    => $vars->templateVar('description_page'),
            'background_img' => $vars->templateVar('background_img'),
        ]);
    }

    public function aboutPage() {
        $vars = new TemplateVarsByPage('about');
        return view('about', [            
            'title'          => $vars->templateVar('title'),
            'caption'        => $vars->templateVar('caption_page'),
            'description'    => $vars->templateVar('description_page'),
            'background_img' => $vars->templateVar('background_img'),
            'about_us'       => $vars->templateVar('about_us'),
        ]);
    }

    public function contactPage(Request $request) {
        $vars = new TemplateVarsByPage('contact');
        return view('contact', [
            'title'          => $vars->templateVar('title'),
            'caption'        => $vars->templateVar('caption_page'),
            'description'    => $vars->templateVar('description_page'),
            'background_img' => $vars->templateVar('background_img'),
        ]);
    }

    public function singlePostPage($id) {
        $post = Post::find($id);
        $vars = new TemplateVarsByPage('post');        
        return view('single-post', [
            'title'          => $vars->templateVar('title'),
            'caption'        => $post->title,
            'description'    => $post->sub_title,
            'background_img' => $vars->templateVar('background_img'),
            'post'           => $post
        ]);
    }

    public function loginPage(Request $request) {
        $vars = new TemplateVarsByPage('login');
        return view('login', [
            'title'          => $vars->templateVar('title'),
            'caption'        => $vars->templateVar('caption_page'),
            'description'    => $vars->templateVar('description_page'),
            'background_img' => $vars->templateVar('background_img'),
        ]);
    }

    public function registrationPage() {
        $vars = new TemplateVarsByPage('registration');
        return view('registration', [
            'title'          => $vars->templateVar('title'),
            'caption'        => $vars->templateVar('caption_page'),
            'description'    => $vars->templateVar('description_page'),
            'background_img' => $vars->templateVar('background_img'),
        ]);
    }

}