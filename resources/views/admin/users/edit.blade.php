<x-layout title="Users">
    <x-card-form title="Edit User" :action="route('admin.users.update', $user)" method="PUT" submit="Save">
        @include('admin.users._form')
    </x-card-form>
</x-layout>
