<x-layout title="Pages">
    <x-card-form title="Create Page" :action="route('admin.pages.store')" method="POST" submit="Create">
        @include('admin.pages._form')
    </x-card-form>
</x-layout>
