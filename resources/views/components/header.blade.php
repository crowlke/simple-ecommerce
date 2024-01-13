<!-- resources/views/components/header.blade.php -->

<div class="flex justify-between items-center bg-gray-400 p-4 text-white">
    <div>
        <a href="/">Logo</a>
    </div>

    <div class="flex items-center">
        @auth
            <span class="mr-4">Welcome, {{ auth()->user()->name }}</span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>

            @if (!auth()->user()->is_admin)
                <li class="font-sans block mt-4 lg:inline-block lg:mt-0 lg:ml-6 align-middle text-black hover:text-gray-700">
                    <a href="{{ route('shopping.cart') }}" role="button" class="relative flex">
                    <svg class="flex-1 w-8 h-8 fill-current" viewbox="0 0 24 24">
                        <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"/>
                        </svg>
                        <span class="absolute right-0 top-0 rounded-full bg-red-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center">{{ count((array) session('cart')) }}
                    </span>
                    </a>
                </li>
            @endif

        @else
            <a href="{{ route('login') }}" class="mr-4">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth


    </div>
</div>

@if(session('success'))

    <div class="bg-green-100 border-l-4 border-greed-500 text-green-700 p-4" role="alert">
        <p class="font-bold"> {{ session('success') }}</p>
        <p>Click at the shopping cart icon to get your full list =).</p>
    </div>
    
@endif
