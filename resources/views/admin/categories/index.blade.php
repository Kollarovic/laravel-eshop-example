<x-layout>
    <x-card-list title="Categories" :createLink="route('admin.categories.create')" :model="$categories">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th>Name</th>
                <th>Active</th>
                <th width="160">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <x-grid.column-boolean :value="$category->active" />
                    </td>
                    <td>
                        <x-grid.button-edit :action="route('admin.categories.edit', $category)" />
                        <x-grid.button-delete :action="route('admin.categories.destroy', $category)" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-card-list>
</x-layout>
