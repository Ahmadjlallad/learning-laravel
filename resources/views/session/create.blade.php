
@extends('layout')
@section('content')
    <section class="mx-auto block p-6 rounded-lg shadow-lg bg-gray-100 max-w-sm">
        <form action="/sessions" method="post">
            <div class="form-group mb-6">
                <label for="email" class="form-label inline-block mb-2 text-gray-700">Email address</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control @error('email') border-red-500 @else border-gray-300 @enderror block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="email"
                       aria-describedby="emailHelp" placeholder="Enter email">
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			         @error('email')
                    {{$message}}
                    @enderror
		        </span>

            </div>
            <div class="form-group mb-6">
                <label for="password"
                       class="form-label inline-block mb-2 text-gray-700">Password</label>
                <input type="password"
                       class="form-control @error('password') border-red-500 @else border-gray-300 @enderror block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       id="password"
                       placeholder="Password"
                       name="password"
                >

                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
			         @error('password')
                    {{$message}}
                    @enderror
		        </span>
            </div>
            <button type="submit"
                    class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Submit
            </button>
            @csrf
        </form>
    </section>
@endsection
