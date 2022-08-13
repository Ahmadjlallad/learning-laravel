{{--@php--}}
{{--/* @var \App\Models\Post $post */--}}
{{--@endphp--}}
{{--<title>Blog</title>--}}
{{--@extends('layout')--}}
{{--@section('banner')--}}
{{--    <h1>My posts</h1>--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    @foreach($posts as $post)--}}
{{--        <article>--}}
{{--            <a href="{{URL::to("/post", ['slug' => $post->slug])}}"><h2>{{$post->title}}</h2></a>--}}
{{--            <x-author-archer :username="$post->author->username"></x-author-archer>--}}
{{--            <p>--}}
{{--                {!! $post->body !!}--}}
{{--            </p>--}}
{{--            <a href="{{URL::to('/category', ['category' => $post->category?->slug])}}">{{ $post->category?->name }}</a>--}}
{{--        </article>--}}
{{--    @endforeach--}}
{{--@endsection--}}
@extends('layout')
@section('content')
    @include('_post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card></x-post-featured-card>
        <div class="lg:grid lg:grid-cols-2">
            <x-post-card></x-post-card>
            <x-post-card></x-post-card>
        </div>
        <div class="lg:grid lg:grid-cols-3">
            <x-post-card></x-post-card>
            <x-post-card></x-post-card>
            <x-post-card></x-post-card>
        </div>
    </main>
@endsection
