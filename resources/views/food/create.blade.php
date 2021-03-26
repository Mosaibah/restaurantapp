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
                manage food
            </header>

            <div class="w-full p-6">
                <form 
                    action="{{route('food.store')}}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Name --}}
                    <label 
                        for="name"
                        class="text-2xl">
                        Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        class="block border-2 w-full h-14 text-xl outline-none mt-2 rounded-xl
                        @error('name')
                            border-red-500
                        @enderror">
                        @error('name')
                        <p class="text-red-500 text-s italic mt-3">
                            {{ $message }}
                        </p>
                        @enderror

                        {{-- Description --}}
                        <div class="mt-5">
                            <label 
                                for="description"
                                class="text-2xl">
                                Description
                            </label>
                            <input 
                                type="text"
                                name="description"
                                id="description"
                                class="block border-2 w-full h-14 text-xl outline-none mt-2 rounded-xl
                                @error('description')
                                border-red-500
                                @enderror">
                                @error('description')
                                <p class="text-red-500 text-s italic mt-3">
                                    {{ $message }}
                                </p>
                                @enderror                               
                            </div>

                        {{-- Category --}}
                        <div class="mt-5">
                            <label 
                                for="category"
                                class="text-2xl">
                                Category
                            </label>
                            <select 
                                name="category" 
                                id="category"
                                class="block border-2 w-full h-14 text-xl outline-none mt-2 rounded-xl
                                @error('category')
                                border-red-500
                                @enderror">
                                <option value="">Select Category</option>
                                    @foreach (App\Models\Category::all() as $category)
                                        <option 
                                            value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                            </select>
                            @error('category')
                            <p class="text-red-500 text-s italic mt-3">
                                {{ $message }}
                            </p>
                            @enderror                           
                        </div>

                        {{-- Price --}}
                        <div class="mt-5">
                            <label 
                                for="price"
                                class="text-2xl">
                                Price
                            </label>
                            <input 
                                type="number"
                                name="price"
                                id="price"
                                class="block border-2 w-full h-14 text-xl outline-none mt-2 rounded-xl
                                @error('price')
                                border-red-500
                                @enderror">
                                @error('price')
                                <p class="text-red-500 text-s italic mt-3">
                                    {{ $message }}
                                </p>
                                @enderror                                
                        </div>

                        {{-- Image --}}
                        <div class="mt-5">
                            <input 
                                type="file"
                                name="image"
                                class="block border-2 w-1/4 h-14 text-xl outline-none mt-2 rounded-xl 
                                @error('image')
                                border-red-500
                                @enderror">
                                @error('image')
                                <p class="text-red-500 text-s italic mt-3">
                                    {{ $message }}
                                </p>
                                @enderror                               
                        </div>

                    <button class="bg-whiht text-blue-500 py-3 px-5 mt-5 rounded-xl border-2 border-blue-400 font-bold hover:text-white hover:bg-blue-500 transition ease-out duration-500 " >Submit</button>
                
                </form>
            </div>
        </section>
    </div>
</main>
@endsection

