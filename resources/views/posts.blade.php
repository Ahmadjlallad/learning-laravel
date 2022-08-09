<title>Blog</title>
@extends('layout')
@section('banner')
    <h1>My posts</h1>
@endsection
@section('content')
    @foreach($posts as $post)
        <article>
            <a href="{{URL::to("/post", ['slug' => $post->slug])}}"><h2>{{$post->title}}</h2></a>
            <p>
                {!! $post->body !!}
            </p>
            <a href="#">{{ $post->category?->name }}</a>
        </article>
    @endforeach
@endsection
