@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Update Inspection</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inspections.update', $inspection->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Inspection Date:</label>
            <input type="date" name="inspection_date" class="w-full px-3 py-2 border rounded" value="{{ $inspection->inspection_date }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Results:</label>
            <textarea name="results" class="w-full px-3 py-2 border rounded">{{ $inspection->results }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Passed:</label>
            <select name="passed" class="w-full px-3 py-2 border rounded">
                <option value="" {{ is_null($inspection->passed) ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ $inspection->passed == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $inspection->passed == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Update</button>
    </form>
</div>
@endsection
