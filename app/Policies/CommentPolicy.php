<?php

namespace App\Policies;

use App\Models\Eloquent\User;
use App\Models\Eloquent\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Comment $comment) {
        return $user->id === $comment->user_id;
    }
}
