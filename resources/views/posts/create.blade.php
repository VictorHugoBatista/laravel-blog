@extends('layouts.app')

@section('content')
@include('posts.form', ['action' => '/posts'])
@endsection
