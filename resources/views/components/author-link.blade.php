@props(['post'])
<a href="{{ route('home', array_merge(request()->except('author'), ['author' => $post->author->username])) }}">{{ $post->author->name }}</a>