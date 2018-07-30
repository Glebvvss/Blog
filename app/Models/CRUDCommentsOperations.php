<?php

namespace App\Models;

use App\Models\MakeTree;
use App\Models\SearchChildrenOfNodes;
use App\Models\Eloquent\Comment;
use DB;
use Auth;

class CRUDCommentsOperations {
    
	public function getTreeCommentsByPost($idPost) {
		$comments = Comment::with('user')
                    ->where('post_id', '=', $idPost)
                    ->get()
                    ->toArray();

        $makeTree = new MakeTree();
        return $makeTree->makeTree($comments);
	}

	public function addComment($request) {
		$comment = new Comment();
        $comment->parent_id = $request->idParentComment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->postId;
        $comment->comment = $request->comment;
        $comment->save();
	}

	public function dropComment($idComment) {
		$deleteList = $this->selectCommentsListForDelete($idComment);
        Comment::where($deleteList)->delete();
	}

	private function selectCommentsListForDelete($idParentComment) {
		$comments = Comment::all()->toArray();

        $makeTree = new MakeTree();
        $treeComments = $makeTree->makeTree($comments);

        $search = new SearchChildrenOfNodes();
        $childrenOfCommentList = $search->getChildrenNodesList($treeComments, $idParentComment);

        return $this->formatterForOrWhere($idParentComment, $childrenOfCommentList);
	}

	private function formatterForOrWhere($idParentComment, $childrenOfCommentList) {
		$formattedData = [
			['id', '=', $idParentComment, 'or']
		];		
        foreach( $childrenOfCommentList as $idChildComment ) {
            $formattedData[] = ['id', '=', $idChildComment, 'or'];
        }
        return $formattedData;
	}

}
