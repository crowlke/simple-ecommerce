@extends('home.layouts.app')

@section('title', 'Home')

@section('content')

<div class="flex items-center justify-center p-4 flex-col">
  <button id="dropdownDefault"
    class="text-white bg-blue-400 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
    type="button">
    Filter by category
    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
  </button>

  <!-- Dropdown menu -->
  <div id="dropdown" class="z-10 w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700 mt-10 transition">
    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
      Category
    </h6>
    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
      <li class="flex items-center">
        <input id="apple" type="checkbox" value=""
          class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

        <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
          Apple (56)
        </label>
      </li>
    </ul>
  </div>
</div>


<section class="products">
        <h1 class="text-4xl font-thin mb-8">Product List</h1>
  
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($products as $product)
          <!-- Product Card 1 -->
          <div class="bg-white p-6 rounded-lg shadow-md transition-transform transform hover:scale-105 delay-150">
              <img src="{{ asset('images') }}/{{ $product->image }}" alt="Product Image" class="mb-4 rounded-md">
              <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>
              <p class="text-gray-700"> {{ $product->description }}</p>
              <div class="mt-4 flex items-center justify-between">
                  <span class="text-blue-500 font-bold">${{ $product->price }}</span>
                  <a href="{{ route('products.add.to.cart', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 cursor-pointer">Add to Cart</a>
              </div>
          </div>
        @endforeach
      </div>

  </div>



</section>

@endsection

@section('script')

<script>
  window.addEventListener("load", function(event) {
    document.querySelector('#dropdownDefault').addEventListener('click', e => {
      document.querySelector('#dropdown').classList.toggle('hidden')
    })
  });
</script>

@endsection