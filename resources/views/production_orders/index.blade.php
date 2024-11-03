@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Production Orders</h1>

    <a href="{{ route('production_orders.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create New Order
    </a>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 text-green-700 p-4 my-4">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Number</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($orders as $order)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->order_number }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->product_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->quantity }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('production_orders.edit', $order->id) }}" class="text-blue-600">Edit</a> |
                        <form action="{{ route('production_orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
