<x-layout>
    <div class="container mx-auto px-6 py-12 flex flex-col items-center">
        <!-- Success Message Section -->
        <div class="bg-white p-6 rounded-lg shadow-md text-center w-full max-w-md">
            <svg class="w-16 h-16 mx-auto text-green-500" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1.25 14.682l-3.75-3.75 1.414-1.414L10.75 13.8l5.836-5.836 1.414 1.414-7.25 7.25z" clip-rule="evenodd"/>
            </svg>
            <h2 class="text-2xl font-semibold mt-4">Thank you for your purchase!</h2>
            <p class="text-gray-600 mt-2">Your transaction has been completed successfully.</p>
        </div>

        <!-- Transaction Summary Section -->
        {{-- <div class="bg-white p-6 mt-6 rounded-lg shadow-md w-full max-w-lg">
            <h3 class="text-xl font-semibold mb-4">Transaction Summary</h3>
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span>Transaction ID:</span>
                    <span class="font-medium">#123456789</span>
                </div>
                <div class="flex justify-between">
                    <span>Date:</span>
                    <span class="font-medium">October 28, 2024</span>
                </div>
                <div class="flex justify-between">
                    <span>Amount Paid:</span>
                    <span class="font-medium">$45.00</span>
                </div>
                <div class="flex justify-between">
                    <span>Payment Method:</span>
                    <span class="font-medium">Credit Card</span>
                </div>
                <hr class="my-4">
                <div class="flex justify-between font-semibold text-lg">
                    <span>Total</span>
                    <span>$45.00</span>
                </div>
            </div>
        </div> --}}

        <!-- Action Buttons -->
        <div class="flex space-x-4 mt-6">
            {{-- <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Download Receipt</button> --}}
            <a href="/" class="bg-gray-700 text-gray-50 px-4 py-2 rounded-lg hover:bg-gray-900">Back to Home</a>
        </div>
    </div>
</x-layout>