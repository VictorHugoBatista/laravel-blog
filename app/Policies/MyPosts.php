<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MyPosts
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

    public function userCanUpdatePost($user, $post)
    {
        return $post->user->id === $user->id;
    }
}
