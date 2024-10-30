<x-layout>
    {{-- {{ dd( auth()->user()) }} --}}
    <div class="container w-11/12 mx-auto mt-4 md:h-96 md:max-w-none md:w-9/12 p-8 md:mb-32 ring-1 ring-gray-300 rounded-md shadow-lg">
        <h1 class="text-center font-semibold text-4xl">Welcome {{ auth()->user()->name }}</h1>
    </div>
</x-layout>