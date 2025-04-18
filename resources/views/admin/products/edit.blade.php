<x-layout title="Products">
    <x-card-form title="Edit Product" :action="route('admin.products.update', $product)" method="PUT" submit="Save">
        @include('admin.products._form')
    </x-card-form>
</x-layout>
