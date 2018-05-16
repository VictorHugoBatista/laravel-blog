@extends('layouts.app')

@section('content')
<div class="row">
    @if(isset($posts))
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
                        <form action="/posts/{{$post->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="btn btn-danger btn-block">Delete post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="col-md-12">
        <div class="alert alert-danger text-center">
            <b>
                You have not created any posts.
                Create a post <a href="/posts/create">here</a>
            </b>
        </div>
    </div>
    @endif
</div>
@endsection
