<x-layout>
    <x-card-list title="Orders" :model="$orders">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Items</th>
                <th width="200">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->items->sum('quantity') }}</td>
                    <td>
                        <x-grid.button-view :action="route('admin.orders.show', $order)" />
                        <x-grid.button-delete :action="route('admin.orders.destroy', $order)" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-card-list>
</x-layout>
