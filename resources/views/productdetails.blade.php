<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-2xl text-indigo-800 leading-tight">
          {{ __('Product Details') }}
      </h2>
  </x-slot>

  <div class="py-12 min-h-screen bg-gradient-to-b from-[#e8edfa] to-[#f6f8fe]">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 flex flex-col md:flex-row gap-8">
      <!-- Product Image -->
      <div class="flex-shrink-0 flex justify-center items-center">
        <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" class="w-72 h-72 object-contain rounded-lg shadow">
      </div>
      <div class="flex-1 flex flex-col justify-between">
        <div>
          <h2 class="text-2xl font-bold text-indigo-800 mb-2">{{ $product->product_name }}</h2>
          <p class="text-xl text-blue-700 font-semibold mb-4">৳{{ $product->product_price }}</p>
          <h3 class="text-lg font-semibold text-indigo-700 mb-1">Product Description</h3>
          <p class="text-indigo-600 mb-6">{{ $product->product_description ?? 'No description available.' }}</p>
        </div>
        <div class="flex gap-4 mt-4">
          <a href="{{ route('compare.add', ['product_id' => $product->product_id]) }}" class="px-5 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-800 transition">Compare</a>
          <button id="buyButton" class="px-5 py-2 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-900 transition" data-product-id="{{ $product->product_id }}">Add to cart</button>
        </div>
      </div>
    </div>
  </div>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>
  document.addEventListener('DOMContentLoaded', function () {
      const buyButton = document.getElementById('buyButton');

      if (buyButton) {
          buyButton.addEventListener('click', function () {
              const productId = buyButton.dataset.productId;

              // Perform a fetch request to add the product to the cart
              fetch(`/product/${productId}/add-to-cart`, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').content,
                  },
                  body: JSON.stringify({
                      product_id: productId,
                  }),
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // Show flash message
                      showFlashMessage('Product added to cart successfully!', '#6366f1');
                  } else {
                      // Show error message if the operation fails
                      showFlashMessage('Failed to add product to cart. ' + (data.message || 'Please try again.'), '#f44336');
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  showFlashMessage('An error occurred. Please try again.', '#f44336');
              });
          });
      }

      function showFlashMessage(message, backgroundColor) {
          const flashMessage = document.createElement('div');
          flashMessage.textContent = message;
          flashMessage.style.position = 'fixed';
          flashMessage.style.top = '10px';
          flashMessage.style.right = '10px';
          flashMessage.style.backgroundColor = backgroundColor;
          flashMessage.style.color = '#fff';
          flashMessage.style.padding = '10px';
          flashMessage.style.borderRadius = '5px';
          flashMessage.style.zIndex = '1000';
          flashMessage.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';

          document.body.appendChild(flashMessage);

          setTimeout(() => {
              flashMessage.remove();
          }, 3000);
      }
  });
  </script>
</x-app-layout>

