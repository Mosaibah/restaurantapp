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

            @if (Session::has('message'))
                <div class="w-4/5 m-auto mt-5 ">
                    <p class="w-2/6 mb-4 py-3 px-5 text-gray-50 bg-green-500 rounded-xl text-center ">
                        {{Session::get('message')}}
                    </p>
                </div>
            @endif

            {{-- <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md capitalize text-4xl">
                Manage food
            </header>

            <div class="w-full p-2">

                                
                <div class="overflow-hidden text-gray-700 body-font">
                    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                        <div class="flex flex-wrap -m-1 md:-m-2">
                            @foreach ($foods as $food)
                            <div class="flex flex-wrap w-1/3 p-4">
                                <div class="w-full rounded-b-lg shadow hover:shadow-xl">

                                    <div class=""  >
                                        <img src="{{asset('images/' . $food->image)}}"  width="500" height="600" alt="">
                                    </div>

                                    <div class="bg-gray-300 w-full rounded-b-lg p-4 flex justify-between">
                                    
                                        <div class="flex items-center ">
                                            <span 
                                            class="py-2 px-2 text-3xl  ">
                                            {{$food->name}}
                                            </span>
                                        </div>
                                    
                                        <div class="flex justify-center ">
                                            <a href="/food/{{$food->id}}/edit" class="border-gray-100 border-b-2 pb-1 border-blue-300 m-1 flex items-end">Edit</a>
                                            <form 
                                                action="/food/{{$food->id}}"
                                                method="POST" class="flex items-end">
                                                
                                                @csrf
                                                @method("delete")

                                                <button 
                                                    class="border-b-2 pb-1 border-red-300 m-1">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                    
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </div> 
                    </div>
                </div>

                
                <div class=" mt-5 w-4/5 m-auto mb-10 mt-15"><a 
                    href="food/create"
                    class="bg-blue-500 text-green-100  py-3 px-5 rounded-2xl font-bold">
                    Create food
                </a></div> --}}
                {{--  --}}

                
<div class="w-full bg-white p-12">
    <div class="header flex items-end justify-between mb-12">
        <div class="title">
            <p class="text-4xl font-bold text-gray-800 mb-4">
                Manage Foods
            </p>
        </div>
        <div class="text-end">
            <form class="flex w-full max-w-sm space-x-3">
                    <a class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" href="/food/create">
                       Create a new Food
                    </a>
                </form>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
            @foreach ($foods as $food)
                
                <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">  
                        <img alt="blog photo" src="{{asset('images/' . $food->image)}}" class="max-h-40 w-full object-cover"/>
                        <div class="bg-white dark:bg-gray-800 w-full p-4">
                            <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
                                {{$food->name}}
                            </p>
                            <p class="text-gray-400 dark:text-gray-300 font-light text-md"   
                            style="
                                white-space: inherit;
                                width: 293px;
                                overflow: hidden;
                                text-overflow: revert;
                                height: 35px;
                                padding: 1px 0px 0px 0px;
                                margin: 4px 0px 3px 0px;">
                                {{$food->description}}
                            </p>
                            <div class="flex  justify-between mt-7 text-sm">
                        
                    
                                    <p class="text-gray-400 dark:text-gray-300" style="margin-bottom: -13px;">
                                       {{$food->price}} SAR
                                    </p>

                                    
                                <div class="flex justify-end mr-3">
                                    <button type="button" class="bg-blue-100 text-blue-400 px-3 py-1 rounded-md shadow-xs">
                                        @foreach (App\Models\Category::where('id', $food->category_id)->get() as $category)
                                            {{$category->name}}
                                        @endforeach
                                    </button>
                                </div>
                              

                                    
                                    <a href="/food/{{$food->id}}/edit" class="border-gray-100 border-b-2 pb-1 border-blue-300 m-1 flex items-end">Edit</a>
                                    <form 
                                        action="/food/{{$food->id}}"
                                        method="POST" class="flex items-end">
                                            
                                        @csrf
                                        @method("delete")

                                        <button 
                                            class="border-b-2 pb-1 border-red-300 m-1">
                                            Delete
                                        </button>
                                    </form>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>

                {{--  --}}
                <div class="mt-15 mx-4 mb-4">
                    {{-- !! وااااو يالحركة الجاااامدة --}}
                    {{$foods->links()}}
                </div>

              
                
                
            </div>
        </section>
    </div>
</main>


@endsection
