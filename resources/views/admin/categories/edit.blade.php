<x-layout title="Categories">
    <x-card-form title="Edit Category" :action="route('admin.categories.update', $category)" method="PUT" submit="Save">
        @include('admin.categories._form')
    </x-card-form>
</x-layout>
