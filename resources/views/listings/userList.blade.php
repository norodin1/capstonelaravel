<x-layout>

    <div
    class="container mx-auto mt-2 md:h-12 md:max-w-none md:w-full border-2 items-center flex justify-center rounded-sm bg-gray-600 text-gray-50"
  >
    <h2 class="text-center">User List!</h2>
  </div>

  <div class="container mx-auto mt-4 md:h-auto md:max-w-none md:w-9/12 flex justify-end">
    <!-- Modal toggle -->
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" id="create-new" onclick="onCreate()"
        class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        <strong><i class="bi bi-plus-lg"></i></strong> Create New User
    </button>
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
          @foreach ($users as $user)
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
          >
            
            <td
              class="px-6 py-4 font-semibold text-gray-900 dark:text-white text-center"
            >
            {{ $user->name }}
            </td>
            <td
              class="px-6 py-4 font-semibold text-gray-900 dark:text-white text-center"
            >
            {{ $user->email }}
            </td>
            <td
              class="px-6 py-4 font-bold text-lg text-gray-900 dark:text-white text-center"
            >
            {{ $user->type }}
            </td>
            <td
              class="px-6 py-4 font-semibold text-gray-900 dark:text-white text-center"
            >
              {{ $user->created_at }}
            </td>
            <td class="px-6 py-4">
              <div class="flex space-x-3 justify-center">
                  <!-- Modal toggle -->
                  @if ($user->type == 'admin')
                  <button onclick="onEdit({{ json_encode($user) }})"
                      class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                      type="button">
                      <strong><i class="bi bi-pen-fill"></i></strong>Change Password
                  </button>
                  @endif
                  <form action="{{ route('admin.delete.user') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $user->id }}">
                      <button
                          class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                          type="submit">
                          <strong><i class="bi bi-trash-fill"></i>Delete
                      </button>
                  </form>

              </div>
          </td>
          </tr>
            
          @endforeach
        </tbody>
      </table>
      {{ $users->links() }}
    </div>
  </div>

  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true"
  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal-title">
                  Create New User
              </h3>
              <button type="button"
                  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-toggle="crud-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          @foreach ($errors->all() as $error)
              <div>{{ $error }}</div>
          @endforeach
          <form class="p-4 md:p-5" id="form" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="submit-type" id="submit-type" value="{{ old('submit-type') }}">
              <input type="hidden" name="id" id="id" value="{{ old('id') }}">
              <input type="hidden" name="type" id="type" value="admin">
              <div class="grid gap-4 mb-4 grid-cols-2">
                  <div class="col-span-2" id="id-col">
                      <label for="name"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                      <input type="text" name="name" id="name" value="{{ old('name') }}"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                          placeholder="Type user name" required="" />
                  </div>
                  <div class="col-span-2" id="email-col">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type user email" required="" />
                   </div>
                  <div class="col-span-2">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type user password" required="" />
                   </div>
                  <div class="col-span-2">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat Password</label>
                    <input type="password" id="repeat-password" name="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type user password" required="" />
                   </div>
              </div>
              <button type="submit"
                  class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                          clip-rule="evenodd"></path>
                  </svg>
                  Submit
              </button>
          </form>
      </div>
    </div>
  </div>

   @push('scripts')
        <script type="application/javascript">
        import { initFlowbite } from 'flowbite'
        
        // initialize components based on data attribute selectors
        initFlowbite();
        </script>
        @if ($errors->count() > 0)
            <script>
                window.addEventListener('load', function() {
                    const type = '{{ old('submit-type') }}';
                    if(type == 'edit'){
                      document.getElementById('name').required = false;
                      document.getElementById('email').required = false;
                      document.getElementById('id-col').style.display = 'none';
                      document.getElementById('email-col').style.display = 'none' 
                      document.getElementById('modal-title').innerHTML = 'Edit Password';
                    }
                    const modal = FlowbiteInstances.getInstance('Modal', 'crud-modal');
                    modal.show();
                })
            </script>
        @endif
        <script>
            function onEdit(data) {
                document.getElementById('form').action = '{{ route('admin.update.user') }}';
                document.getElementById('form').method = 'POST';
                document.getElementById('id').value = data?.id;
                document.getElementById('modal-title').innerHTML = 'Edit Password';
                document.getElementById('name').required = false;
                document.getElementById('email').required = false;
                document.getElementById('submit-type').value = 'edit';
                document.getElementById('password').value = '';
                document.getElementById('repeat-password').value = '';
                document.getElementById('id-col').style.display = 'none';
                document.getElementById('email-col').style.display = 'none' 
                console.warn(data);
                const modal = FlowbiteInstances.getInstance('Modal', 'crud-modal');
                modal.show();
            }

            function onCreate() {
                document.getElementById('form').action = '{{ route('admin.create.user') }}';
                document.getElementById('form').method = 'POST';
                console.warn(document.getElementById('form'));
                document.getElementById('id-col').style.display = 'block';
                document.getElementById('email-col').style.display = 'block' 
                document.getElementById('modal-title').innerHTML = 'Create New User';
                document.getElementById('id').value = '';
                document.getElementById('submit-type').value = 'create';
                document.getElementById('name').required = true;
                document.getElementById('email').required = true;
            }

        </script>
    @endpush

</x-layout>