@extends('layouts.app')

@section('content')
<div class="media">
    <div class="media-body">
        <h2 class="media-heading">
            {{ $post->title }}
        </h2>
        <div>
            By <strong>{{ $post->user->name }}</strong> at
            <strong>{{ $post->created_at->format('H:i - d/m/Y') }}</strong>
        </div>
        <div>
            {{ $post->content }}
        </div>
        @if($post->tags && 0 < count($post->tags))
        <div>
            Tags:
            <ul>
                @foreach ($post->tags as $tag)
                <li>{{ $tag->title }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <hr />
        <div>
            @if($post->comments && 0 < count($post->comments))
            <div>
                @foreach ($post->comments as $comment)
                <div>
                    <h3>{{ $comment->subject }}</h3>
                    <p>
                        {{ $comment->body }}
                    </p>
                </div>
                @endforeach
            </div>
            @endif
            @include('comments.create')
        </div>
    </div>
</div>
@endsection
