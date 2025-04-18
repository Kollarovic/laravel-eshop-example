@props(['product'])

<form method="POST" action="{{ route('shop.cart.add', $product) }}">
    @csrf
    <button type="submit" {{ $attributes->merge(['class' => 'bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700']) }}>
        Add to cart
    </button>
</form>
