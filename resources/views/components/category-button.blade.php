
@php
    /* @var \App\Models\Category $category*/
@endphp
<a href="{{URL::to('/category', ['category' => $category->slug])}}"
   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
   style="font-size: 10px">{{$category->slug}}</a>
