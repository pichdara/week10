@extends('layouts.app')

@section('content')
    <h4>Show Post</h4>
    <b>Title:</b> {{ $post->title }} <br>
    <b>Category:</b> {{ $post->category->name }} <br>
    <b>Category:</b> {{ $post->author }} <br>
    <b>Posted By:</b> {{ $post->user->name }} <br>
    <b>Content:</b> {{ $post->content }} <br>
@endsection