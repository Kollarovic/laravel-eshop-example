<x-shop.layout :title="$product->name">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded shadow">
            @else
                <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded text-gray-500 text-sm">
                    No image
                </div>
            @endif
        </div>

        <div>
            <h1 class="text-2xl font-bold mb-2">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-2">Category: {{ $product->category->name }}</p>
            <p class="mb-4">{{ $product->description }}</p>
            <p class="text-xl font-semibold mb-4">{{ number_format($product->price, 2) }} € / {{ $product->unit }}</p>
            <x-shop.add-to-cart :product="$product" class="py-2" />
        </div>

    </div>
</x-shop.layout>
