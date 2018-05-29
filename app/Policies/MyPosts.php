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

    public function update($user, $post)
    {
        return $this->updateAndDelete($user, $post);
    }

    public function delete($user, $post)
    {
        return $this->updateAndDelete($user, $post);
    }

    private function updateAndDelete($user, $post)
    {
        return $post->user->id === $user->id;
    }
}
