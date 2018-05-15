@extends('layouts.app')

@section('content')
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-6">
        <div class="media">
            <div class="media-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="media-heading">
                            {{ $post->title }}
                        </h4>
                        <div>
                            Date: <strong>{{ $post->created_at->format('H:i - d/m/Y') }}</strong>
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
                    <div class="col-md-4">
                        <button class="btn btn-danger btn-block">Delete post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
