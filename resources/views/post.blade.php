@php
    use App\Models\Post;
    /* @var $post Post*/
    assert($post instanceof Post);

@endphp
<title>{{$post->title}}</title>
@extends('layout')
@section('banner')
    <h1>{{$post->title}}</h1>
    <h2>By <a href="#">Ahmad</a> in <a href="{{URL::to('/category', ['category' => $post?->category->slug])}}">{{$post->category->name}}</a></h2>
@endsection
@section('content')
    <article>
        <p>
            {!! $post->body !!}
        </p>
    </article>
    <a href="{{URL::to('/')}}">Go back</a>
@endsection
