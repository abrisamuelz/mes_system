@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Schedule Inspection</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inspections.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Production Order:</label>
            <select name="production_order_id" class="w-full px-3 py-2 border rounded">
                @foreach ($productionOrders as $order)
                    <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Scheduled Date:</label>
            <input type="date" name="scheduled_date" class="w-full px-3 py-2 border rounded" value="{{ old('scheduled_date') }}">
        </div>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Schedule</button>
    </form>
</div>
@endsection
