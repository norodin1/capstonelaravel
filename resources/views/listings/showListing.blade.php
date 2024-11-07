<x-layout>
  @php
        
        if(!function_exists("makeQuery")) {
          function makeQuery($cat){
              $array = [];
              if (request()->get('keyword')) {
                  $array['keyword'] = request()->get('keyword');
              }
              if (request()->get('category') != $cat) {
                  $array['category'] = $cat;
              }
              return $array;
          }
        }
    @endphp
    <div
        class="container mx-auto md:h-12 md:max-w-none md:w-full items-center flex justify-center bg-gray-50 text-gray-900"
      >
        <h2 class="text-center">Explore New Styles!</h2>
      </div>

      <div
        class="container w-11/12 mx-auto mt-4 md:h-full md:max-w-none md:w-9/12 p-8 md:mb-32 ring-1 ring-gray-300 rounded-md shadow-lg"
      >
        <div class="md:grid md:grid-cols-2">
          <div class="flex justify-center">
            @if ($listing->image)
                    <img
                    class="p-8 rounded-t-lg md:h-80"
                    src="{{ asset('storage/img/listings/' . $listing->image) }}"
                    alt="product image"
                    />
                        
                    @else
                    <img
                    class="p-8 rounded-t-lg md:h-80"
                    src="{{ asset('no-image.png') }}"
                    alt="product image"
                    />
                        
                    @endif
          </div>
          <!-- Product details -->
          <div class="mx-2">
            <h1 class="my-6 font-black text-2xl">{{$listing['itemName']}}</h1>
            <p class="my-6 font-semibold text-xl">$ {{$listing['itemPrice']}}</p>
            <div class="flex items-center justify-between mt-2.5 mb-5">
              <div class="flex items-center">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                  <svg
                    class="w-4 h-4 text-yellow-300"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 22 20"
                  >
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                    />
                  </svg>
                  <svg
                    class="w-4 h-4 text-yellow-300"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 22 20"
                  >
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                    />
                  </svg>
                  <svg
                    class="w-4 h-4 text-yellow-300"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 22 20"
                  >
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                    />
                  </svg>
                  <svg
                    class="w-4 h-4 text-yellow-300"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 22 20"
                  >
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                    />
                  </svg>
                  <svg
                    class="w-4 h-4 text-gray-200 dark:text-gray-600"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 22 20"
                  >
                    <path
                      d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                    />
                  </svg>
                </div>
                <span
                  class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"
                  >5.0</span
                >
              </div>
            </div>
            <!-- Item Category -->
            <a href="{{route('search', makeQuery($listing['category']))}}"
              ><span
                class="text-end text-white bg-gray-700 hover:bg-gray-900 focus:ring-2 focus:outline-none focus:ring-gray-300 p-1 rounded-md"
                >{{$listing['category']}}</span
              ></a
            >
            <!-- Item Desription -->
            <p class="my-6 font-semibold text-xl">
                {{$listing['description']}}
            </p>
            <div class="my-6">
              @if (auth()->check() && auth()->user()->type != 'admin')
                    <form action="{{ route('listing.cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="itemId" value="{{ $listing->id }}">
                        <button type="submit"
                            class="text-white bg-gray-700 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >Add to cart</button
                        >
                    </form>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="text-white bg-gray-700 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >Add to cart</a
                    >
                    @endif
            </div>
          </div>
        </div>
      </div>
</x-layout>