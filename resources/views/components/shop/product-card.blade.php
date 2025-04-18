@props(['product'])

<div {{ $attributes->merge(['class' => 'bg-white p-4 shadow rounded hover:shadow-md transition']) }}>
    <a href="{{ route('shop.product.show', $product) }}">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded mb-4">
        @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded mb-4 text-gray-500 text-sm">
                No image
            </div>
        @endif
    </a>

    <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
    <p class="text-gray-600 mb-2">
        {{ number_format($product->price, 2) }} € / {{ $product->unit }}
    </p>

    <div class="flex justify-between items-center mt-4">
        <a href="{{ route('shop.product.show', $product) }}" class="text-blue-600 hover:underline text-sm">Detail</a>
        <x-shop.add-to-cart :product="$product" />
    </div>
</div>
