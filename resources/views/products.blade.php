<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-2xl text-indigo-800 leading-tight">
          {{ __('Products') }}
      </h2>
  </x-slot>

  <div class="py-12 min-h-screen bg-gradient-to-b from-[#e8edfa] to-[#f6f8fe]">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
          <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition flex flex-col items-center">
            <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}" class="w-48 h-48 object-contain mb-4 rounded">
            <h2 class="text-lg font-semibold text-indigo-800 mb-1 text-center">{{ $product->product_name }}</h2>
            <p class="text-xl text-blue-700 font-bold mb-2">৳{{ $product->product_price }}</p>
            <a href="{{ route('product.details', ['product_id' => $product->product_id]) }}" class="px-5 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-800 transition mt-2">Details</a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
