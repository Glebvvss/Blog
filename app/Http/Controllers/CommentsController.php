<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddCommentRequest;
use App\Models\CRUDCommentsOperations;

class CommentsController extends Controller {

    public function getComments(Request $request) {
        $crud = new CRUDCommentsOperations();
        $treeComments = $crud->getTreeCommentsByPost($request->idPost);
        return view('single-post-components.comments', [
            'treeComments' => $treeComments
        ]);
    }

    public function addComment(AddCommentRequest $request) {
        $crud = new CRUDCommentsOperations();
        $crud->addComment($request);
    }

    public function dropComment(Request $request) {
        $crud = new CRUDCommentsOperations();
        $crud->dropComment($request->idComment);
    }

}