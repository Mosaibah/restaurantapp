@extends('layouts.app')



@section('content')

<!-- component -->
{{-- <div class="mt-20"></div> --}}
<header class=" dark:bg-gray-800">
   
    <div class="container flex flex-col px-6 py-4 mx-auto space-y-6 md:h-128 md:py-16 md:flex-row md:items-center md:space-x-6">
        <div class="flex flex-col items-center w-full md:flex-row md:w-1/2">
            
{{-- 
            <div class="max-w-lg md:mx-12 md:order-2">
                <h1 class="text-3xl font-medium tracking-wide text-gray-800 dark:text-white md:text-4xl">
                    {{$food->name}}
                </h1>
                <p class="mt-4 text-gray-600 dark:text-gray-300">
                    {{$food->description}}
                </p>
                <div class="mt-6">
                    <a href="#" class="block px-3 py-2 font-semibold text-center text-white transition-colors duration-200 transform bg-blue-500 rounded-md md:inline hover:bg-blue-400">
                        Download from App Store
                    </a>
                </div>
            </div> --}}
            <!-- component -->
<main class="w-full flex justify-center">
    <div class="flex flex-col  p-3 space-y-5 rounded-xl border  bg-white shadow-md">
        
        <section class="text-3xl font-bold mx-4 mb-5">
            {{$food->name}}
        </section>
        <section class="font-normal text-md text-gray-700">
            {{$food->description}}
        </section>
        <section class="font-bold text-lg text-blue-900">
            {{$food->price}} SAR
        </section>
        <section class="flex justify-end">
            <button type="button" class="bg-blue-100 text-blue-400 px-3 py-1 rounded-md shadow-xs">
                {{$category->name}}
            </button>
        </section>
    </div>
</main>
        </div>
{{--  --}}



        {{--  --}}

        <div class="flex items-center justify-center w-full h-96 md:w-1/2">
            <img class="object-cover w-full h-full max-w-2xl rounded-md" src="{{config("url")."/images/".$food->image}}" alt="apple watch photo">
        </div>
    </div>
</header>
@endsection