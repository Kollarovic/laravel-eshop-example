<x-layout title="Pages">
    <x-card-form title="Edit Page" :action="route('admin.pages.update', $page)" method="PUT" submit="Save">
        @include('admin.pages._form')
    </x-card-form>
</x-layout>
