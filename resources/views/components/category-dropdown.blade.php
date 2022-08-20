<x-dropdown.index>
    <x-slot name="trigger">
        <button class="py-2 pl-3 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{$currentCategory->slug ?? 'Category'}}
            <x-down-arrow></x-down-arrow>
        </button>
    </x-slot>
    <x-dropdown.item href="{{URL::to('/')}}" :active="!request('category')">All</x-dropdown.item>
    @foreach($categories as $category)
        <x-dropdown.item :active="request('category') === $category->slug"
                         href="{{route('home', array_merge(['category' => $category->slug], request()->except('category')))}}">{{ucwords($category->slug)}}</x-dropdown.item>
    @endforeach
</x-dropdown.index>