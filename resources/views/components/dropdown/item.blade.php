@props([ 'active' => false ])
@php
    /* @var $active boolean */
    $classes = 'block text-left px-3 leading-6 hover:bg-blue-500 focus:bg-blue-500 focus:text-white line-clamp';
    if ($active) {
        $classes.= ' bg-blue-500 text-white';
    }
@endphp
<a {{$attributes(['class' => $classes])}}>{{$slot}}</a>