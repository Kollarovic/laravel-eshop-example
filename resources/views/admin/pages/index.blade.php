<x-layout>
    <x-card-list title="Pages" :createLink="route('admin.pages.create')" :model="$pages">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th>Name</th>
                <th>Active</th>
                <th width="160">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->name }}</td>
                    <td>
                        <x-grid.column-boolean :value="$page->active" />
                    </td>
                    <td>
                        <x-grid.button-edit :action="route('admin.pages.edit', $page)" />
                        <x-grid.button-delete :action="route('admin.pages.destroy', $page)" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-card-list>
</x-layout>
