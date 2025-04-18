<x-layout title="Users">
    <x-card-form title="Create User" :action="route('admin.users.store')" method="POST" submit="Create">
        @include('admin.users._form')
    </x-card-form>
</x-layout>
