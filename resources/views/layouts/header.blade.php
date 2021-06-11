<header class="bg-transparent py-6" style="margin-bottom: -66px">
    <div class="container mx-auto flex justify-between items-center px-6">
        <div>
            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-200 no-underline">
                {{ config('app.name', 'Laravel') }}
            </a>
            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-200 no-underline px-5">
                {{__('Menu')}}
            </a>
        </div>
        <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
            @if (Auth::check())
            <div class="inline mx-10  p-3">
            <a class="no-underline hover:underline p-3" href="{{ route('category.index') }}">{{ __('Category') }}</a>
            <a class="no-underline hover:underline" href="{{ route('food.index') }}">{{ __('Food') }}</a>
        </div>
            @endif
            @guest
                <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                {{-- @if (Route::has('register'))
                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif --}}
            @else
                <span>{{ Auth::user()->name }}</span>

                <a href="{{ route('logout') }}"
                   class="no-underline hover:underline"
                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
            @endguest
        </nav>
    </div>
</header>
