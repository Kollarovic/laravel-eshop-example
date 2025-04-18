<x-shop.layout title="Shopping Cart">

    <h2 class="text-2xl font-bold mb-6">Shopping Cart</h2>

    @if($cart->isEmpty())
        <p class="text-gray-500">Your cart is empty.</p>
    @else
        <div class="space-y-6">

            @foreach($cart->getItems() as $item)
                <div class="bg-white rounded shadow p-4 grid grid-cols-1 md:grid-cols-4 gap-4 items-center">

                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold">{{ $item->getName() }}</h3>
                        <p class="text-gray-500">Price: €{{ number_format($item->getPrice(), 2) }}</p>
                    </div>

                    <div>
                        <form action="{{ route('shop.cart.update', $item->getId()) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('POST')
                            <input type="number" name="quantity" value="{{ $item->getQuantity() }}" min="1" class="w-16 text-center border rounded" />
                            <button class="bg-blue-600 text-white text-sm px-3 py-1 rounded hover:bg-blue-700">
                                Update
                            </button>
                        </form>
                    </div>

                    <div class="flex justify-between md:justify-end items-center gap-4">
                        <div class="text-right">
                            <p class="text-gray-600">Subtotal:</p>
                            <p class="font-bold">€{{ number_format($item->getTotal(), 2) }}</p>
                        </div>
                        <form action="{{ route('shop.cart.remove', $item->getId()) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="text-red-600 hover:underline text-sm">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="text-right mt-6">
                <p class="text-xl font-semibold">Total: €{{ number_format($cart->getTotal(), 2) }}</p>

                <div class="mt-4 flex justify-end gap-4">
                    <form action="{{ route('shop.cart.clear') }}" method="POST">
                        @csrf
                        <button class="text-sm text-gray-600 hover:underline">Clear Cart</button>
                    </form>

                    <a href="{{ route('shop.checkout.index') }}" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        Proceed to Checkout
                    </a>
                </div>
            </div>

        </div>
    @endif

</x-shop.layout>
