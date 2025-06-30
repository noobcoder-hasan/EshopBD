<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Compare Products') }}
      </h2>
  </x-slot>

  <style>
      body {
          font-family: 'Segoe UI', Arial, sans-serif;
          margin: 0;
          padding: 0;
          background: linear-gradient(135deg, #e0e7ff 0%, #f4f7fc 100%);
      }
      main {
          padding: 32px 0 48px 0;
      }
      .product-grid {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
          gap: 32px;
          justify-items: center;
      }
      .product-card {
          background: linear-gradient(135deg, #fff 60%, #e0e7ff 100%);
          padding: 32px 24px 24px 24px;
          border-radius: 18px;
          box-shadow: 0 8px 32px rgba(99,102,241,0.10);
          text-align: center;
          transition: transform 0.25s cubic-bezier(.4,2,.6,1), box-shadow 0.25s;
          width: 100%;
          max-width: 340px;
          position: relative;
      }
      .product-card:hover {
          transform: translateY(-8px) scale(1.03);
          box-shadow: 0 12px 36px rgba(99,102,241,0.18);
      }
      .product-card img {
          width: 100%;
          height: 180px;
          border-radius: 12px;
          object-fit: cover;
          margin-bottom: 18px;
          box-shadow: 0 2px 12px rgba(99,102,241,0.08);
      }
      .product-card h2 {
          font-size: 1.45rem;
          color: #3730a3;
          font-weight: 700;
          margin-bottom: 8px;
          letter-spacing: 0.01em;
      }
      .product-card .price {
          font-size: 1.15rem;
          font-weight: 600;
          color: #2563eb;
          margin-bottom: 12px;
      }
      .product-card p {
          color: #4b5563;
          font-size: 1rem;
          margin-bottom: 8px;
      }
      .product-card p strong {
          color: #6366f1;
      }
      .remove-button {
          background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
          color: #fff;
          padding: 10px 24px;
          border-radius: 8px;
          text-decoration: none;
          font-weight: 600;
          font-size: 1rem;
          border: none;
          outline: none;
          transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
          margin-top: 16px;
          display: inline-flex;
          align-items: center;
          gap: 8px;
          box-shadow: 0 2px 8px rgba(239,68,68,0.08);
          cursor: pointer;
      }
      .remove-button i {
          font-size: 1.1rem;
      }
      .remove-button:hover, .remove-button:focus {
          background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
          box-shadow: 0 4px 16px rgba(239,68,68,0.18);
          transform: translateY(-2px) scale(1.04);
      }
      .no-products {
          text-align: center;
          font-size: 1.25rem;
          color: #6366f1;
          margin-top: 48px;
          font-weight: 500;
      }
      @media (max-width: 600px) {
          main {
              padding: 16px 0 32px 0;
          }
          .product-card {
              padding: 20px 8px 16px 8px;
          }
      }
  </style>

  <main>
      @if(count($compareProducts) > 0)
          <div class="product-grid">
              @foreach($compareProducts as $product)
                  <div class="product-card" id="product-{{ $product->product_id }}">
                      <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">

                      <h2>{{ $product->product_name }}</h2>
                      <p class="price">
                        <i class="fas fa-tag"></i> ${{ $product->product_price }}
                      </p>

                      <p><strong>Description:</strong> {{ $product->product_description ?? 'No description available.' }}</p>
                      <p><strong>Brand:</strong> <i class="fas fa-industry"></i> {{ $product->brand ?? 'No brand specified' }}</p>

                      <button class="remove-button" onclick="removeFromCompare({{ $product->product_id }})">
                        <i class="fas fa-trash-alt"></i> Remove
                      </button>
                  </div>
              @endforeach
          </div>
      @else
          <p class="no-products">
            <i class="fas fa-box-open fa-lg me-2"></i>No products selected for comparison.
          </p>
      @endif
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
  <script>
      function removeFromCompare(productId) {
          fetch(`/compare/remove/${productId}`, {
              method: 'GET',
              headers: {
                  'X-Requested-With': 'XMLHttpRequest',
              },
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  const productCard = document.getElementById('product-' + productId);
                  if (productCard) {
                      productCard.remove();
                  }
              }
          })
          .catch(error => console.log('Error removing product:', error));
      }
  </script>

</x-app-layout>
