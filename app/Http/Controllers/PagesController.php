<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eloquent\User;
use App\Models\Eloquent\Post;
use App\Models\TemplateManager;

class PagesController extends Controller {

    public function indexPage() {        
        $tpl = new TemplateManager('index');
        return view('index', [
            'title'          => $tpl->getVar('title'),
            'caption'        => $tpl->getVar('caption_page'),
            'description'    => $tpl->getVar('description_page'),
            'background_img' => $tpl->getVar('background_img'),
        ]);
    }

    public function aboutPage() {
        $tpl = new TemplateManager('about');
        return view('about', [            
            'title'          => $tpl->getVar('title'),
            'caption'        => $tpl->getVar('caption_page'),
            'description'    => $tpl->getVar('description_page'),
            'background_img' => $tpl->getVar('background_img'),
            'about_us'       => $tpl->getVar('about_us'),
        ]);
    }

    public function contactPage(Request $request) {
        $tpl = new TemplateManager('contact');
        return view('contact', [
            'title'          => $tpl->getVar('title'),
            'caption'        => $tpl->getVar('caption_page'),
            'description'    => $tpl->getVar('description_page'),
            'background_img' => $tpl->getVar('background_img'),
        ]);
    }

    public function singlePostPage($id) {
        $post = Post::find($id);
        $tpl = new TemplateManager('single-post');
        return view('single-post', [
            'title'          => $tpl->getVar('title'),
            'caption'        => $post->title,
            'description'    => $post->sub_title,
            'background_img' => $tpl->getVar('background_img'),
            'post'           => $post
        ]);
    }

    public function loginPage(Request $request) {
        $tpl = new TemplateManager('login');
        return view('login', [
            'title'          => $tpl->getVar('title'),
            'caption'        => $tpl->getVar('caption_page'),
            'description'    => $tpl->getVar('description_page'),
            'background_img' => $tpl->getVar('background_img'),
        ]);
    }

    public function registrationPage() {
        $tpl = new TemplateManager('registration');
        return view('registration', [
            'title'          => $tpl->getVar('title'),
            'caption'        => $tpl->getVar('caption_page'),
            'description'    => $tpl->getVar('description_page'),
            'background_img' => $tpl->getVar('background_img'),
        ]);
    }

}