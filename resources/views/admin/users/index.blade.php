<x-layout>
    <x-card-list title="Users" :createLink="route('admin.users.create')" :model="$users">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th width="160">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <x-grid.button-edit :action="route('admin.users.edit', $user)" />
                        <x-grid.button-delete :action="route('admin.users.destroy', $user)" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-card-list>
</x-layout>
