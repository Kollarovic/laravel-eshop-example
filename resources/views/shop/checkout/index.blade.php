<x-shop.layout title="Checkout">

    <div class="flex items-center justify-center px-4">
        <div class="w-full max-w-xl">
            <h2 class="text-2xl font-bold mb-6">Checkout</h2>

            <form action="{{ route('shop.checkout.process') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block font-semibold">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label for="email" class="block font-semibold">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block font-semibold">Street Address</label>
                    <input type="text" name="street" value="{{ old('street') }}" class="w-full border rounded p-2" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold">Postal Code</label>
                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="block font-semibold">City</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="w-full border rounded p-2" required>
                    </div>
                </div>

                <div class="text-right">
                    <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        Submit Order
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-shop.layout>
