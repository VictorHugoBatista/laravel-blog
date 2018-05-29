@extends('layouts.app')

@section('content')
@include('posts.form', ['action' => "/posts/{$post->id}", 'method' => 'put', 'data' => $post])
@endsection
