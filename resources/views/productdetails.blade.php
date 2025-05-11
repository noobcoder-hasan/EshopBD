<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Product Details') }}
      </h2>
  </x-slot>

  <style>
      /* General Page Styling */
      body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
      }

      .product-details {
          display: flex;
          flex-wrap: wrap;
          gap: 20px;
          padding: 20px;
          background-color: #fff;
      }

      .product-details img {
          max-width: 300px;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .product-info {
          flex: 1;
          padding: 20px;
      }

      .product-info h2 {
          font-size: 1.5rem;
          margin-bottom: 10px;
      }

      .product-info p.price {
          font-size: 1.25rem;
          color: #3f51b5;
          font-weight: bold;
      }

      .product-info button {
          padding: 10px 20px;
          background-color: #3f51b5;
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 1rem;
          margin-right: 10px;
      }

      .product-info button:hover {
          background-color: #303f9f;
      }

      /* Ensure the Compare button is styled and visible */
      .button {
          background-color: #3f51b5;
          color: #fff;
          padding: 10px 20px;
          border-radius: 5px;
          text-decoration: none;
          font-weight: bold;
          transition: background-color 0.3s;
          margin-top: 15px;
          display: inline-block;
          margin-right: 10px;
      }

      .button:hover {
          background-color: #303f9f;
      }

      /* Product Image */
      .product-details img {
          max-width: 300px; /* Ensure the image doesn't exceed this width */
          height: auto; /* Maintain aspect ratio */
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          object-fit: cover; /* Makes sure the image covers the space without distorting */
      }
      
      /* Ensure the product-info section can grow */
      .product-info {
          flex: 1;
          padding: 20px;
          overflow: hidden; /* Hide overflow if necessary */
      }
      
      /* Allow product description text to scroll if it's too long */
      .product-info p {
          overflow-y: auto;
          max-height: 200px; /* Limit the height if you want the description to scroll */
          font-size: 1rem;
          color: #555;
          line-height: 1.5;
      }
  </style>

  <main>
      <div class="product-details">
          <!-- Product Image -->
          <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}">

          <div class="product-info">
              <!-- Product Name -->
              <h2>{{ $product->product_name }}</h2>

              <!-- Product Price -->
              <p class="price">${{ $product->product_price }}</p>

              <h2>Product Description </h2>
              <p>{{ $product->product_description ?? 'No description available.' }}</p>

              <!-- Compare Button -->
              <a href="{{ route('compare.add', ['product_id' => $product->product_id]) }}" class="button">Compare</a>

              <!-- Buttons -->
              <button id="buyButton" class="buy-button" data-product-id="{{ $product->product_id }}">Add to cart</button>
          </div>
      </div>
  </main>

  <meta name="csrf-token" content="{{ csrf_token() }}">

</x-app-layout>

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
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    product_id: productId,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show flash message
                    showFlashMessage('Product added to cart successfully!', '#4caf50');
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

