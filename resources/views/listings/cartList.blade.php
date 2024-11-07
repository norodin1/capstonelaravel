<x-layout>

    <div
        class="container m-2 mt-2 md:h-12 md:max-w-none md:w-full border-2 items-center flex justify-center rounded-sm bg-gray-600 text-gray-50"
      >
        <h2 class="text-center">Your Cart List!</h2>
      </div>
      @unless(count($carts)==0)

      <div class="container mx-auto mt-4 md:min-h-96 md:max-w-none md:w-9/12">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
          >
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th scope="col" class="px-16 py-3">
                  <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">Product</th>
                <th scope="col" class="px-6 py-3">Qty</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">Action</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($carts as $key => $cart)
              {{-- {{ dd($cart->itemDetails) }} --}}
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
              >
                <td class="p-4">
                  @if ($cart->itemDetails->image)
                  <img
                    src="{{ asset('storage/img/listings/' . $cart->itemDetails->image) }}"
                    class="w-16 md:w-32 max-w-full max-h-full"
                    alt="Apple Watch"
                  />
                    
                  @else
                  <img
                    src="{{ asset('no-image.png') }}"
                    class="w-16 md:w-32 max-w-full max-h-full"
                    alt="Apple Watch"
                    
                    />
                  @endif
                </td>
                <td
                  class="px-6 py-4 font-semibold text-gray-900 dark:text-white"
                >
                {{ $cart->itemDetails->itemName }}
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center">
                    <button onclick="onDec('{{ $key }}', {{ json_encode($cart) }})"
                      class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                      type="button"
                    >
                      <span class="sr-only">Quantity button</span>
                      <svg
                        class="w-3 h-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 18 2"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M1 1h16"
                        />
                      </svg>
                    </button>
                    <div>
                      <input
                        type="number"
                        id="qty{{ $key }}"
                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="1"
                        min="1"
                        required
                        onchange="onChange(event, {{ json_encode($cart) }})"
                        value= {{ $cart->qty }}
                      />
                    </div>
                    <button
                    onclick="onAdd('{{ $key }}', {{ json_encode($cart) }})"
                      class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                      type="button"
                    >
                      <span class="sr-only">Quantity button</span>
                      <svg
                        class="w-3 h-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 18 18"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 1v16M1 9h16"
                        />
                      </svg>
                    </button>
                  </div>
                </td>
                <td
                  class="px-6 py-4 font-semibold text-gray-900 dark:text-white"
                >
                  $ {{ $cart->itemDetails->itemPrice }}
                </td>
                <td class="px-6 py-4">
                  <form action="{{ route('listing.cart.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $cart->id }}">
                    <button
                        class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="submit">
                        <strong>Remove
                    </button>
                </form>
                </td>
              </tr>
                
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="relative overflow-x-auto  flex justify-center m-2 md:m-auto">
        <table
          class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400  md:w-9/12"
        >
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400"
          >
          <tfoot>
            <tr class="font-semibold text-gray-900 bg-gray-50 dark:text-white">
              <td class="px-6 py-3"></td>
              <th scope="row" class="px-6 py-3 text-base text-center">
                Total
              </th>
              <td class="px-6 py-3 text-2xl text-center" id="total">$ {{ $total }}</td>
            </tr>
          </tfoot>
        </table>
        
      </div>
      @else
            <div class="container mx-auto my-16 min-h-60 md:min-h-96 md:max-w-none md:w-9/12 items-center flex justify-center shadow-md sm:rounded-lg">
              <p class="text-2xl font-semibold">Cart is Empty</p>
            </div>
          @endunless

      <div
        class="container m-2 md:mx-auto md:h-12 md:max-w-none md:w-9/12 items-center flex justify-center shadow-md sm:rounded-lg py-12"
      >
        <div class="flex space-x-8">
          <a
            href="{{ route('home') }}"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            aria-current="page"
          >
            Back to Shop
          </a>
        <div class="flex space-x-8">
          <a
            href="{{ route('listing.cart.checkout') }}"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            aria-current="page"
          >
          Checkout
          </a>          
      </div>
      @push('scripts')
        @php
            echo '<script> const carts ='.json_encode($carts).'; </script>';
        @endphp
        <script>
            function saveQty(qty, data){
                const form = new FormData()
                form.append('_token', '{{ csrf_token() }}');
                form.append('id', data?.id);
                form.append('qty', qty);
                fetch('{{ route('listing.cart.change') }}', {
                  method: 'POST',
                  header: {
                    'Content-Type': 'application/json'
                  },
                  body: form
                }).then((response) => response.json())
                .then((json) => console.log(json));
            }
            function onChange(event, data) {
                const qty = event.target.value;
                let total = 0;
                for (const cart of carts) {
                  total += (cart?.id == data?.id? qty : cart?.qty) * cart?.item_details?.itemPrice;
                  if (cart?.id == data?.id) {
                    cart.qty = qty;
                  }
                }
                document.getElementById('total').innerHTML = '$'+total;
                saveQty(qty, data)
            }
            function onAdd(key, data) {
                const qty =  Number(document.getElementById('qty'+key).value) + 1;
                document.getElementById('qty'+key).value = qty;
                let total = 0;
                for (const cart of carts) {
                  total += (cart?.id == data?.id? qty : cart?.qty) * cart?.item_details?.itemPrice;
                  if (cart?.id == data?.id) {
                    cart.qty = qty;
                  }
                }
                document.getElementById('total').innerHTML = '$'+total;
                saveQty(qty, data)
                console.warn(data);
            }
            function onDec(key, data) {
                const qty =  Number(document.getElementById('qty'+key).value) - 1;
                if(qty > 0){
                  document.getElementById('qty'+key).value = qty;
                  let total = 0;
                for (const cart of carts) {
                  total += (cart?.id == data?.id? qty : cart?.qty) * cart?.item_details?.itemPrice;
                  if (cart?.id == data?.id) {
                    cart.qty = qty;
                  }
                }
                document.getElementById('total').innerHTML = '$'+total;
                saveQty(qty, data)
                  console.warn(data);
                }
            }

        </script>
    @endpush
</x-layout>