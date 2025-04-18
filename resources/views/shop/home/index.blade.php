<x-shop.layout title="Home">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <aside class="md:col-span-1">
            <h2 class="text-xl font-semibold mb-4">Categories</h2>
            <x-shop.category-menu />
        </aside>

        <section class="md:col-span-3">
            <h2 class="text-2xl font-bold mb-4">Featured products</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <x-shop.product-card :product="$product" />
                @endforeach
            </div>
        </section>
    </div>
</x-shop.layout>
