<x-layout>
    <div class="container mx-auto p-6 lg:flex lg:space-x-6">
        <!-- Billing & Shipping Details -->
        <div class="w-full lg:w-2/3 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Payment Method</h2>
            <h2 class="text-xl font-semibold mb-4">G-Cash</h2>
            <div class="w-full flex justify-center">
                <img class="p-2 rounded-t-lg md:h-96"
                src="{{ asset('/images/QRcode.png') }}"
                alt="G-cash QRcode">
            </div>

            <div class="w-full flex justify-center my-4">
                <p class="">Please scan the Qr code and enter reference number  then click confirm to proceed. <br>Thank you!</p>
            </div>

            <form action="{{ route('listing.cart.completeCart') }}" class="space-y-4">
    
                <!-- Reference number -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Enter reference number</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-gray-500 focus:ring-gray-500" placeholder="" required>
                </div>
                
                <button type="submit" class="w-full mt-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700">
                    Confirm
                </button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="w-full lg:w-1/3 bg-white p-6 rounded-lg shadow-md mt-6 lg:mt-0">
            <h2 class="text-2xl font-semibold mb-4">Order Summary</h2>
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span>Item 1</span>
                    <span>$20.00</span>
                </div>
                <div class="flex justify-between">
                    <span>Item 2</span>
                    <span>$15.00</span>
                </div>
                <div class="flex justify-between">
                    <span>Item 3</span>
                    <span>$10.00</span>
                </div>
                <hr class="my-4">
                <div class="flex justify-between font-semibold text-lg">
                    <span>Total</span>
                    <span>$45.00</span>
                </div>
            </div>
        </div>
    </div>
</x-layout>