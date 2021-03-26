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

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md capitalize text-4xl">
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
                </a></div>

                <div>
                    {{-- !! وااااو يالحركة الجاااامدة --}}
                    {{$foods->links()}}
                </div>

              
                
                
            </div>
        </section>
    </div>
</main>


@endsection
