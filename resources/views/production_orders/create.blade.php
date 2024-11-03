@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Create Production Order</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('production_orders.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Order Number:</label>
            <input type="text" name="order_number" class="w-full px-3 py-2 border rounded" value="{{ old('order_number') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Product Name:</label>
            <input type="text" name="product_name" class="w-full px-3 py-2 border rounded" value="{{ old('product_name') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Quantity:</label>
            <input type="number" name="quantity" class="w-full px-3 py-2 border rounded" value="{{ old('quantity') }}">
        </div>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</button>
    </form>
</div>
@endsection
