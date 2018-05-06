<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function getSidebarTags()
    {
        return static::has('posts')->get();
    }

    public function getRouteKeyName()
    {
        return 'title';
    }
}
