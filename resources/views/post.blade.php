@php
    use App\Models\Post;
    use Illuminate\Support\Facades\URL;
    /* @var $post */
    assert($post instanceof Post);

@endphp
<title>{{$post->title}}</title>
@extends('layout')
@section('banner')
    <h1>{{$post->title}}</h1>
@endsection
@section('content')
    <article>
        <p>
            {!! $post->body !!}
        </p>
    </article>
    <a href="{{URL::to('/')}}">Go back</a>
@endsection
