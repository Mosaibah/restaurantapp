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
                Menue
            </header>

            <div class="w-full p-2">

                                
                <div class="overflow-hidden text-gray-700 body-font">
                    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                        <div class="flex flex-wrap -m-1 md:-m-2">
                            {{-- @foreach ($foods as $food)
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
                                

                                    
                                </div>
                                </div>
                            </div>
                            @endforeach --}}
                        </div> 
                    </div>
                </div>

                <div>
                    {{-- !! وااااو يالحركة الجاااامدة --}}
                    {{-- {{$foods->links()}} --}}
                </div>

              
                
                
            </div>
        </section>
    </div>
</main>


@foreach ($categories as $category)
    {{$category->name}}
    @foreach (App\Models\Food::where('category_id', $category->id)->get() as $food)
        {{$food->name}}

        <a href="{{route('food.view', [$food->id])}}">اطلب</a>
    @endforeach

@endforeach



@endsection
