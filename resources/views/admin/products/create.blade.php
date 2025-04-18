<x-layout title="Products">
    <x-card-form title="Create Product" :action="route('admin.products.store')" method="POST" submit="Create">
        @include('admin.products._form')
    </x-card-form>
</x-layout>
