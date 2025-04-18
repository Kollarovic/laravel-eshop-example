<x-layout title="Users">
    <x-card-form title="Edit Profile" :action="route('admin.profile.update', $user)" method="PUT" submit="Save">
        @include('admin.users._form')
    </x-card-form>
</x-layout>
