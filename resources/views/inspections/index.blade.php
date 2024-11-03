@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Inspections</h1>

    <a href="{{ route('inspections.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Schedule Inspection
    </a>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 text-green-700 p-4 my-4">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Production Order</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Scheduled Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Inspection Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Passed</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($inspections as $inspection)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inspection->productionOrder->order_number }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inspection->scheduled_date }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $inspection->inspection_date ?? 'Pending' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if (is_null($inspection->passed))
                            Pending
                        @else
                            {{ $inspection->passed ? 'Yes' : 'No' }}
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('inspections.edit', $inspection->id) }}" class="text-blue-600">Edit</a> |
                        <form action="{{ route('inspections.destroy', $inspection->id) }}" method="POST" style="display:inline;">
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
