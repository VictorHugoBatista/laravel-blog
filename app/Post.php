<?php

namespace App;

use \App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addComment(Comment $comment)
    {
        $this->comments()->save($comment);
    }

    public static function archive()
    {
        return static::selectRaw('monthname(created_at) as month, year(created_at) as year, count(*) as number')
        ->groupBy('year', 'month')
        ->orderByRaw('created_at desc')
        ->get();
    }
}
