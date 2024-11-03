@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Production Order</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('production_orders.update', $productionOrder->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Order Number:</label>
            <input type="text" name="order_number" class="w-full px-3 py-2 border rounded bg-gray-100" value="{{ $productionOrder->order_number }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Product Name:</label>
            <input type="text" name="product_name" class="w-full px-3 py-2 border rounded" value="{{ $productionOrder->product_name }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Quantity:</label>
            <input type="number" name="quantity" class="w-full px-3 py-2 border rounded" value="{{ $productionOrder->quantity }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Status:</label>
            <select name="status" class="w-full px-3 py-2 border rounded">
                <option value="Scheduled" {{ $productionOrder->status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="Running" {{ $productionOrder->status == 'Running' ? 'selected' : '' }}>Running</option>
                <option value="Completed" {{ $productionOrder->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Update</button>
    </form>
</div>
@endsection
