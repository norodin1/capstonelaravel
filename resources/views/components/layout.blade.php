<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <!-- Bootstrap icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <!-- Flowbite -->
    <link
      href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"
      rel="stylesheet"
    />

    <!-- tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="styles.css" />
    <title>NnyWears</title>
  </head>
  <body>
    <!-- Nav Bar -->
    <x-navbar>
        @include('partials._search')
    </x-navbar>
    

    <main>
        {{$slot}}
    </main>

    <!-- Footer -->

    <footer
      class="bg-white rounded-lg shadow dark:bg-gray-900 m-4 inset-x-0 bottom-0"
    >
      <div class="w-full max-w-screen-3xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-center">
          <ul
            class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400"
          >
            <li>
              <a href="#" class="hover:underline me-4 md:me-6">About</a>
            </li>
            <li>
              <a
                href="https://github.com/norodin1"
                target="_blank"
                class="hover:underline me-4 md:me-6"
                ><i class="bi bi-github text-2xl"></i>
              </a>
            </li>
            <li>
              <a
                href="https://www.facebook.com/norodin.amatonding"
                target="_blank"
                class="facebook me-4 md:me-6"
                ><i class="bi bi-facebook text-2xl"></i
              ></a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/"
                target="_blank"
                class="linkedin me-4 md:me-6"
                ><i class="bi bi-linkedin text-2xl"></i
              ></a>
            </li>
          </ul>
        </div>
        <hr
          class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"
        />
        <span
          class="block text-sm text-gray-500 sm:text-center dark:text-gray-400"
          >Copyright &copy; 2024 | Norodin
          <a href="https://kodego.ph/" target="_blank" class="hover:underline"
            >WD103P</a
          >. All Rights Reserved.</span
        >
      </div>
    </footer>

    <!-- Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  </body>
</html>
