<x-layout title="Categories">
    <x-card-form title="Create Page" :action="route('admin.categories.store')" method="POST" submit="Create">
        @include('admin.categories._form')
    </x-card-form>
</x-layout>
