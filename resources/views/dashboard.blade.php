
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex">

                    @foreach (auth()->user()->orders as $order)
                        <!-- Order Cart 1 -->
                        <div class="bg-white p-6 rounded-lg shadow-md transition-transform transform hover:scale-105 delay-150">
                            Products on order: 
                            <br>
                            <br>
                            @foreach ($order->products as $product)
                                <li>{{ $product->name }} - Quantity: {{ $product->pivot->quantity }}</li>
                            @endforeach
                            <br>
                            <p class="text-gray-500"> Status: {{ $order->status }}</p>
                            <p class="text-gray-500"> Order ID: {{ $order->id }}</p>
                            <div class="mt-4 mb-5 flex items-center justify-between">
                                <span class="text-blue-500 font-bold">Price: ${{ $order->total_price }}</span>
                            </div>
                            @if ($order->status == "Pending")
                                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                                    Pay
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
