<div
        class="container mx-auto md:h-12 md:max-w-none md:w-full items-center flex justify-center bg-gray-400"
      >
        <div class="inline-flex rounded-md shadow-sm">
          <a
         href="{{route('search', makeQuery('top'))}}"
            aria-current="page"
            class="{{ makeQuery('top') ? 'bg-white' : 'bg-gray-500' }} px-4 py-2 text-sm font-medium text-gray-900 border border-gray-200 rounded-s-lg hover:underline hover:underline-offset-4 hover:bg-gray-200 focus:z-10 focus:ring-2 focus:ring-gray-700 focus:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
          >
            Top
          </a>
          <a
               href="{{route('search', makeQuery('bottom'))}}"
            class="{{ makeQuery('bottom') ? 'bg-white' : 'bg-gray-500' }} px-4 py-2 text-sm font-medium text-gray-900 border-t border-b border-gray-200 hover:underline hover:underline-offset-4 hover:bg-gray-200 focus:z-10 focus:ring-2 focus:ring-gray-700 focus:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
          >
            Bottom
          </a>
          <a
           href="{{route('search', makeQuery('footwear'))}}"
            class="{{ makeQuery('footwear') ? 'bg-white' : 'bg-gray-500' }} px-4 py-2 text-sm font-medium text-gray-900 border-t border-b border-gray-200 hover:underline hover:underline-offset-4 hover:bg-gray-200 focus:z-10 focus:ring-2 focus:ring-gray-700 focus:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
          >
            Footwear
          </a>
          <a
            href="{{route('search', makeQuery('accessories'))}}"
            class="{{ makeQuery('accessories') ? 'bg-white' : 'bg-gray-500' }} px-4 py-2 text-sm font-medium text-gray-900 border border-gray-200 rounded-e-lg hover:underline hover:underline-offset-4 hover:bg-gray-200 focus:z-10 focus:ring-2 focus:ring-gray-700 focus:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
          >
            Accessories
          </a>
        </div>
      </div>