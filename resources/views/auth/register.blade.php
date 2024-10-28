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
                Register with NnyWears to unlock exclusive perks—enjoy special
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
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
                <form action="{{ route('create.user') }}" method="POST" class="mx-auto">
                  @csrf
                  <input type="hidden" name="type" value="user">
                  <div class="mb-5">
                    <label
                      for="name"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Your Name</label
                    >
                    <input
                      type="text"
                      name="name"
                      id="name"
                      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                      required
                      value="{{ old('name') }}"
                    />
                  </div>
                  <div class="mb-5">
                    <label
                      for="email"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Your email</label
                    >
                    <input
                      type="email"
                      id="email"
                      name="email"
                      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                      placeholder="name@flowbite.com"
                      required
                      value="{{ old('email') }}"
                    />
                  </div>
                  <div class="mb-5">
                    <label
                      for="password"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Your password</label
                    >
                    <input
                      type="password"
                      id="password"
                      name="password"
                      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                      required
                    />
                  </div>
                  <div class="mb-5">
                    <label
                      for="repeat-password"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Repeat password</label
                    >
                    <input
                      type="password"
                      id="repeat-password"
                      name="password_confirmation"
                      class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                      required
                    />
                  </div>
                  @isset($errors)
                  @foreach ($errors as $error)
                  <div class="mb-5">
                    {{ dd($error) }}
                  </div>
                  @endforeach
                  @endisset
                  <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                      <input
                        id="terms"
                        type="checkbox"
                        value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                        required
                      />
                    </div>
                    <label
                      for="terms"
                      class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                      >I agree with the
                      <a
                        href="#"
                        class="text-blue-600 hover:underline dark:text-blue-500"
                        >terms and conditions</a
                      ></label
                    >
                  </div>
                  <button
                    type="submit"
                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                  >
                    Register new account
                  </button>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
</x-layout>