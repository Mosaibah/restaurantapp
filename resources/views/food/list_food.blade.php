@extends('layouts.app')

@section('content')
<div class="bg-white">

    {{-- First Big Photo --}}
    <div class="background-image-first grid grid-cols-1 m-auto h-screen">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                
            </h1>
            
            </div>
        </div>
    </div>

    {{-- Second Big Photo --}}
    <div class="background-image-second grid grid-cols-1 m-auto h-screen">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                
            </h1>
            
            </div>
        </div>
    </div>

    {{-- Third Big Photo --}}
    <div class="background-image-third grid grid-cols-1 m-auto h-screen">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                
            </h1>
            
            </div>
        </div>
    </div>

    {{-- Start Loop Categories --}}
    @foreach ($categories as $category)
        

        {{-- start category --}}
        <div 
            style="
                background-image: url('https://demo2.tokomoo.com/niku/wp-content/uploads/sites/4/2020/03/Food-edited-2.jpg');
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                "
                class="grid grid-cols-1 m-auto h-56">
            <div class="flex text-gray-100 pt-10">
                <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-gray-300 text-5xl uppercase font-bold text-shadow-md pb-14">
                    {{$category->name}}
                </h1>
                
                </div>
            </div>
        </div>
        {{-- end category --}}
        
        {{-- start cards  --}}
        <div class="container my-12 mx-auto px-4 md:px-12">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                @foreach (App\Models\Food::where('category_id', $category->id)->get() as $food) 
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 ">
                        <div class="overflow-hidden rounded-lg shadow-lg">

                            <a href="#">
                                <img alt="Placeholder" class="block h-auto w-full" src="images/{{$food->image}}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-3xl">
                                    <a class="no-underline hover:underline text-black" href="#">
                                        {{$food->name}}
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    SAR {{$food->price}}
                                </p>
                            </header>

                            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">                    
                                    <p class="ml-2 text-sm">
                                        {{$food->description}}
                                    </p>
                                </a>                     
                            </footer>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- end cards --}}
    {{-- End Loop Categories --}}
    @endforeach

    {{--  --}}
    <div class="bg-gray-400 h-96 text-center text-6xl font-bold text-gray-200 p-24">
        footer here
    </div>

</div>
@endsection