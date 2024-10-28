<x-layout>

    <div
    class="container mx-auto mt-2 md:h-12 md:max-w-none md:w-full border-2 items-center flex justify-center rounded-sm bg-gray-600 text-gray-50"
  >
    <h2 class="text-center">Selling List!</h2>
  </div>

  

  <div class="container mx-auto mt-4 md:h-auto md:max-w-none md:w-9/12">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
      >
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            
            <th scope="col" class="px-6 py-3 text-center">User</th>
            <th scope="col" class="px-6 py-3 text-center">Email</th>
            <th scope="col" class="px-6 py-3 text-center">Type</th>
            <th scope="col" class="px-6 py-3 text-center">Date Created</th>
            <th scope="col" class="px-6 py-3 text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
          >
            
            <td
              class="px-6 py-4 font-semibold text-gray-900 dark:text-white text-center"
            >
               Plain White-shirt
            </td>
            <td
              class="px-6 py-4 font-semibold text-gray-900 dark:text-white text-center"
            >
              Top
            </td>
            <td
              class="px-6 py-4 font-bold text-lg text-gray-900 dark:text-white text-center"
            >
               100
            </td>
            <td
              class="px-6 py-4 font-bold text-lg text-gray-900 dark:text-white text-center"
            >
              $599
            </td>
            <td class="px-6 py-4">
              <div class="flex space-x-3 justify-center">
                
                <button
                  
                  class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                  type="button"
                >
                  <strong><i class="bi bi-trash-fill"></i>Delete
                </button>
                
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</x-layout>