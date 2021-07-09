@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md capitalize text-4xl">
               Create food category
            </header>

            <div class="w-full p-6">
                <form 
                    action="/category/{{$category->id}}"
                    method="post">
                    @csrf
                    @method("PUT")

                    <label 
                        for="name"
                        class="text-2xl">
                        Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        value="{{$category->name}}"
                        class="block border-2 w-full h-14 text-xl outline-none mt-2 px-2
                        @error('name')
                            border-red-500
                        @enderror">
                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror

                    <button class="bg-whiht text-blue-500 py-3 px-5 mt-5 rounded-xl border-2 border-blue-400 font-bold hover:text-white hover:bg-blue-500 transition ease-out duration-500 " >Update</button>
                
                </form>
            </div>
        </section>
    </div>
</main>
@endsection
