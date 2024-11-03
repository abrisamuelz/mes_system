@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Production Status -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Production Status</h2>
            <p>Total Orders: {{ $totalOrders }}</p>
            <p>Running Orders: {{ $runningOrders }}</p>
        </div>

        <!-- Machine Utilization -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Machine Utilization</h2>
            <p>{{ $machineUtilization }}%</p>
            <canvas id="machineUtilizationChart"></canvas>
        </div>

        <!-- Product Defect Rate -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Product Defect Rate</h2>
            <p>{{ number_format($productDefectRate, 2) }}%</p>
            <canvas id="defectRateChart"></canvas>
        </div>
    </div>
</div>

<!-- Include Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Machine Utilization Chart
    const machineUtilizationCtx = document.getElementById('machineUtilizationChart').getContext('2d');
    const machineUtilizationChart = new Chart(machineUtilizationCtx, {
        type: 'bar',
        data: {
            labels: @json($machineUtilizationData['labels']),
            datasets: [{
                label: 'Utilization (%)',
                data: @json($machineUtilizationData['data']),
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    // Product Defect Rate Chart
    const defectRateCtx = document.getElementById('defectRateChart').getContext('2d');
    const defectRateChart = new Chart(defectRateCtx, {
        type: 'line',
        data: {
            labels: @json($defectRateData['labels']),
            datasets: [{
                label: 'Defect Rate (%)',
                data: @json($defectRateData['data']),
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: false,
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            }
        }
    });
</script>
@endsection
