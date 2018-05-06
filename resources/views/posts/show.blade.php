@extends('layouts.app')

@section('content')
<div class="media">
    <div class="media-body">
        <h4 class="media-heading">
            {{ $post->title }}
        </h4>
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
    </div>
</div>
@endsection
