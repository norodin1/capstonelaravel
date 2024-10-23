<x-layout>
    <div class="container mx-auto h-screen">
        <section class="bg-gray-50 dark:bg-gray-900">
          <div
            class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16"
          >
            <div class="flex flex-col justify-center">
              <h1
                class="mb-8 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
              >
                Invest in your looks and unlock your potentials.
              </h1>
              <p
                class="mb-4 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400"
              >
                Login with NnyWears to unlock exclusive perks—enjoy special
                discounts, early access to new arrivals, and personalized style
                recommendations!
              </p>
            </div>
            <div>
              <div
                class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800"
              >
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                  Sign in to NnyWears
                </h2>
                <form class="mt-8 space-y-6" action="#">
                  <div>
                    <label
                      for="email"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Your email</label
                    >
                    <input
                      type="email"
                      name="email"
                      id="email"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="name@company.com"
                      required
                    />
                  </div>
                  <div>
                    <label
                      for="password"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Your password</label
                    >
                    <input
                      type="password"
                      name="password"
                      id="password"
                      placeholder="••••••••"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      required
                    />
                  </div>

                  <button
                    type="submit"
                    class="w-full px-5 py-3 text-base font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                  >
                    Login to your account
                  </button>
                  <div
                    class="text-sm font-medium text-gray-900 dark:text-white"
                  >
                    Not registered yet?
                    <a
                      class="text-blue-600 hover:underline dark:text-blue-500"
                      href="{{ route('register')}}"
                      >Create account</a
                    >
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
</x-layout>