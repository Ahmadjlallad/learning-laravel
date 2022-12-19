@extends('layout')
@section('content')
    <x-form>
        <x-form-input name="title" label="Title" @class(['shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])/>
        <x-form-input name="excerpt" label="Excerpt" @class(['shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])/>
        <x-form-select name="categories" :options="['1' => 1]" @class(['block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500'])/>

        <!-- \Spatie\Translatable\HasTranslations -->
        <x-form-textarea name="body" language="en" placeholder="Body" @class(['shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'])/>

{{--        <!-- Inline radio inputs -->--}}
{{--        <x-form-group name="newsletter_frequency" label="Newsletter frequency" inline>--}}
{{--            <x-form-radio name="newsletter_frequency" value="daily" label="Daily"/>--}}
{{--            <x-form-radio name="newsletter_frequency" value="weekly" label="Weekly"/>--}}
{{--        </x-form-group>--}}

{{--        <x-form-group>--}}
{{--            <x-form-checkbox name="subscribe_to_newsletter" label="Subscribe to newsletter"/>--}}
{{--            <x-form-checkbox name="agree_terms" label="Agree with terms"/>--}}
{{--        </x-form-group>--}}

        <x-form-submit/>
    </x-form>
@endsection


