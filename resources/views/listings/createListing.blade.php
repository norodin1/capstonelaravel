<x-layout>

    <div
        class="container mx-auto mt-2 md:h-12 md:max-w-none md:w-full border-2 items-center flex justify-center rounded-sm bg-gray-600 text-gray-50">
        <h2 class="text-center">Selling List!</h2>
    </div>

    <div class="container mx-auto mt-4 md:h-auto md:max-w-none md:w-9/12 flex justify-end">
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" id="create-new" onclick="onCreate()"
            class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            <strong><i class="bi bi-plus-lg"></i></strong> Create New Listing
        </button>
    </div>

    <div class="container mx-auto mt-4 md:h-auto md:max-w-none md:w-9/12">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-16 py-3">
                            <span class="sr-only">Image</span>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">Product</th>
                        <th scope="col" class="px-6 py-3 text-center">Category</th>
                        <th scope="col" class="px-6 py-3 text-center">Stock Available</th>
                        <th scope="col" class="px-6 py-3 text-center">Price</th>
                        <th scope="col" class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @unless (count($listings) == 0)
                        @foreach ($listings as $listing)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="p-4 flex justify-center">
                                    @if ($listing->image)
                                        <img src="{{ asset('storage/img/listings/' . $listing->image) }}"
                                            class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch" />
                                    @else
                                        <img src="{{ asset('no-image.png') }}" class="w-16 md:w-32 max-w-full max-h-full"
                                            alt="Apple Watch" />
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white text-center">
                                    {{ $listing->itemName }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white text-center">
                                    {{ $listing->category }}
                                </td>
                                <td class="px-6 py-4 font-bold text-lg text-gray-900 dark:text-white text-center">
                                    {{ $listing->stock }}
                                </td>
                                <td class="px-6 py-4 font-bold text-lg text-gray-900 dark:text-white text-center">
                                    ${{ $listing->itemPrice }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3 justify-center">
                                        <!-- Modal toggle -->
                                        <button onclick="onEdit({{ json_encode($listing) }})"
                                            class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            <strong><i class="bi bi-pen-fill"></i></strong>Edit
                                        </button>
                                        <form action="{{ route('admin.delete.listing') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $listing->id }}">
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
                    @else
                        <tr class="md:h-lvh">
                            <td colspan="12" class="text-center text-3xl">No Listings Found</td>
                        </tr>
                    @endunless
                </tbody>
            </table>
            {{ $listings->links() }}
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
                        Create New Product
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
                    <div class="text-center p-2 text-rose-500">{{ $error }}</div>
                @endforeach
                <form class="p-4 md:p-5" id="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ old('id') }}">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type product name" required="" />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="$2999" required="" />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Select category</option>
                                <option value="top" @if (old('category') == 'top') selected @endif>Top</option>
                                <option value="bottom" @if (old('category') == 'bottom') selected @endif>Bottom
                                </option>
                                <option value="footwear" @if (old('category') == 'footwear') selected @endif>Footwear
                                </option>
                                <option value="accessories" @if (old('category') == 'accessories') selected @endif>
                                    Accessories</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Available
                                Stock</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Available stock" required="" />
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                Description</label>
                            <textarea id="description" rows="4" name="description" value="{{ old('stock') }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write product description here"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload Photo</label>
                            <input accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" name="image">
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
                    const modal = FlowbiteInstances.getInstance('Modal', 'crud-modal');
                    modal.show();
                })
            </script>
        @endif
        <script>
            function onEdit(data) {
                document.getElementById('form').action = '{{ route('admin.update.listing') }}';
                document.getElementById('form').method = 'POST';
                document.getElementById('id').value = data?.id;
                document.getElementById('modal-title').innerHTML = 'Edit Product';
                document.getElementById('name').value = data?.itemName;
                document.getElementById('price').value = data?.itemPrice;
                document.getElementById('category').value = data?.category;
                document.getElementById('stock').value = data?.stock;
                document.getElementById('description').value = data?.description;
                console.warn(data);
                const modal = FlowbiteInstances.getInstance('Modal', 'crud-modal');
                modal.show();
            }

            function onCreate() {
                const id = document.getElementById('id').value;
                document.getElementById('form').action = '{{ route('admin.create.listing') }}';
                document.getElementById('form').method = 'POST';
                console.warn(document.getElementById('form'));
                if (id) {
                    document.getElementById('id').value = '';
                    document.getElementById('modal-title').innerHTML = 'Create New Product';
                    document.getElementById('name').value = '';
                    document.getElementById('price').value = '';
                    document.getElementById('category').value = '';
                    document.getElementById('stock').value = '';
                    document.getElementById('description').value = '';
                }
            }
        </script>
    @endpush
</x-layout>
