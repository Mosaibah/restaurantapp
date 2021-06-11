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

          

            <div class="w-full p-2">
                
                <div class="w-full bg-white p-12">
                    <div class="header flex items-end justify-between mb-12">
                        <div class="title">
                            <p class="text-4xl font-bold text-gray-800 mb-4">
                                Manage Categories
                            </p>
                            
                        </div>
                        <div class="text-end">
                            <a class="flex-shrink-0 px-4 py-3 text-base font-semibold text-white bg-purple-500 rounded-lg shadow-md hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" href="/category/create">
                                        Create a new Category
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                        @foreach ($categories as $category)
                                
                            <div class="overflow-hidden shadow-xl rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                            
                                <div class="bg-white dark:bg-gray-800 w-full p-4 text-center">
                                    
                                    <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
                                            {{$category->name}}
                                    </p>
                                    
                                    <div class="flex items-center mt-4 justify-between">
                                        
                                        <div class="flex flex-col justify-between ml-4 text-sm">                         
                                            <p class="text-gray-400 dark:text-gray-300">                             
                                                    {{App\Models\Food::where('category_id', $category->id)->count()}} foods      
                                            </p>
                                        </div>
                                        <div class="flex justify-center ">
                                            <a href="/category/{{$category->id}}/edit" class="border-gray-100 border-b-2 pb-1 border-blue-300 m-1 flex items-end">Edit</a>
                                                <form 
                                                    action="/category/{{$category->id}}"
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
        </section>
    </div>
</main>


@endsection
