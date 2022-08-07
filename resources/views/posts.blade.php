@php
    use Illuminate\Support\Facades\URL;
@endphp
<title>Blog</title>
@extends('layout')
@section('banner')
    <h1>My posts</h1>
@endsection
@section('content')
    @foreach($posts as $post)
        <article>
            <a href="{{URL::to("/post", ['id' => $post->id])}}"><h2>{{$post->title}}</h2></a>
            <p>
                {!! $post->body !!}
            </p>
        </article>
    @endforeach
@endsection
