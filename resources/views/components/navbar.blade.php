
<header>
    <nav
      class="bg-gray-600 dark:bg-gray-900 w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600 md:px-16"
    >
      <div
        class="max-w-screen-3xl flex flex-wrap items-center justify-between mx-auto p-3 w-10/12 md:w-auto"
      >
        <a
          href="https://flowbite.com/"
          class="flex items-center space-x-3 rtl:space-x-reverse order-first mb-2 md:mb-0"
        >
          <img
            src={{ asset('Nny.png') }}
            class="h-16 rounded-sm"
            alt="Flowbite Logo"
          />
          
        </a>
        {{$slot}}
        <div
          class="flex order-last space-x-3 md:space-x-0 rtl:space-x-reverse flex-row-reverse"
        >
          <div
            class="items-center justify-between hidden w-full md:flex md:w-auto order-last md:order-2"
            id="navbar-sticky"
          >
            <ul
              class="flex flex-row p-4 md:pr-3 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-600 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 order-2 md:order-last"
            >
              <li>
                <a
                  href="./index.html"
                  class="block py-2 px-3 hover:text-white text-gray-900 bg-gray-600 hover:border-none border-2 border-gray-900 rounded md:bg-transparent md:p-1.5"
                  aria-current="page"
                >
                  <div class="relative h-12 w-10">
                    <i
                      class="bi bi-house-door absolute inset-x-0 top-0 text-2xl text-center"
                    ></i>
                    <span
                      class="absolute inset-x-0 bottom-0 hover:underline hover:underline-offset-8 text-center text-sm"
                      >Home</span
                    >
                  </div></a
                >
              </li>

              <li>
                <a
                  href="./login.html"
                  class="block py-2 px-3 hover:text-white text-gray-900 bg-gray-600 hover:border-none border-2 border-gray-900 rounded md:bg-transparent md:p-1.5"
                >
                  <div class="relative h-12 w-10">
                    <i
                      class="bi bi-person absolute inset-x-0 top-0 text-2xl text-center"
                    ></i>
                    <span
                      class="absolute inset-x-0 bottom-0 hover:underline hover:underline-offset-8 text-center text-sm"
                      >Login</span
                    >
                  </div>
                </a>
              </li>
              <li>
                <div class="relative">
                  <a
                    href="./cart.html"
                    class="block py-2 px-3 hover:text-white text-gray-900 bg-gray-600 hover:border-none border-2 border-gray-900 rounded md:bg-transparent md:p-1.5"
                    ><div class="relative h-12 w-10">
                      <i
                        class="bi bi-cart-fill absolute inset-x-0 top-0 text-2xl text-center text-2xl"
                      ></i>
                      <span
                        class="absolute inset-x-0 bottom-0 text-center hover:underline hover:underline-offset-8 text-center text-sm"
                        >Cart</span
                      >
                    </div></a
                  >
                  <div
                    id="cartAmount"
                    class="cartAmount absolute h-5 w-5 -right-4 -top-3 text-white bg-gray-900 rounded-md text-center"
                  >
                    0
                  </div>
                </div>
              </li>
            </ul>
          </div>

          <button
            data-collapse-toggle="navbar-sticky"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-sticky"
            aria-expanded="false"
          >
            <span class="sr-only">Open main menu</span>
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 17 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15"
              />
            </svg>
          </button>
        </div>
      </div>
    </nav>
  </header>