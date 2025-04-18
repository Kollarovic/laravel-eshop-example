<x-layout>
    <x-card-list title="Products" :createLink="route('admin.products.create')" :model="$products">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Unit</th>
                <th>VAT</th>
                <th>Active</th>
                <th width="160">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <x-grid.column-image :image="$product->image" />
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category?->name ?? '–' }}</td>
                    <td>{{ number_format($product->price, 2, ',', ' ') }} €</td>
                    <td>{{ $product->unit }}</td>
                    <td>{{ $product->vat }}%</td>
                    <td>
                        <x-grid.column-boolean :value="$product->active" />
                    </td>
                    <td>
                        <x-grid.button-edit :action="route('admin.products.edit', $product)" />
                        <x-grid.button-delete :action="route('admin.products.destroy', $product)" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-card-list>
</x-layout>
