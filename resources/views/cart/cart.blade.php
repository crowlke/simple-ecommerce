@extends('home.layouts.app')

@section('title', 'Shopping Cart')

@section('content')

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach (session('cart') as $id => $details )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $details['name'] }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <input type="number" value="{{ $details['quantity'] }}">
                        </th>
                        <td class="px-6 py-4">
                            ${{ $details['price'] }}
                        </td>
                        <td class="px-6 py-4">
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td class="p-4 flex items-center w-full">
                    <a href="{{ url('/') }}" class="btn-primary mr-5"><i class="fa fa-angle-left"></i> Continue Shopping</a>    

                    <a href="{{ route('orders.store') }}" class="bg-green-400 hover:bg-green-500 transition text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center mr-5 cursor-pointer">
                        <svg class="fill-current w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"></path></svg>
                        <span>Checkout</span>
                    </a>  
                </td>


            </tr>
        </tfoot>
    </table>
</div>


@endsection
