@extends('layouts.app')

@section('content')
@include('posts.form', ['action' => "/posts/{$post->id}", 'data' => $post])
@endsection
