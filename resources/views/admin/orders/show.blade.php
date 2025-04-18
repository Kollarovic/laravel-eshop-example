<x-layout title="Orders">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Order #{{ $order->id }}</h3>
        </div>

        <div class="card-body">
            <h5 class="mb-3">Customer Info</h5>
            <dl class="row">
                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $order->name }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $order->email }}</dd>

                <dt class="col-sm-3">Street</dt>
                <dd class="col-sm-9">{{ $order->street }}</dd>

                <dt class="col-sm-3">Postal Code</dt>
                <dd class="col-sm-9">{{ $order->postal_code }}</dd>

                <dt class="col-sm-3">City</dt>
                <dd class="col-sm-9">{{ $order->city }}</dd>

                <dt class="col-sm-3">Created</dt>
                <dd class="col-sm-9">{{ $order->created_at->format('d.m.Y H:i') }}</dd>
            </dl>

            <h5 class="mt-4 mb-2">Items</h5>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Qty</th>
                    <th class="text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="text-right">{{ number_format($item->price, 2) }} €</td>
                        <td class="text-right">{{ $item->quantity }}</td>
                        <td class="text-right">{{ number_format($item->total, 2) }} €</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-right mt-3">
                <strong>Total:</strong>
                {{ number_format($order->total, 2) }} €
            </div>
        </div>
    </div>
</x-layout>
