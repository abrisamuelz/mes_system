<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductionOrder;
use App\Models\Inspection;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data for key metrics
        $productionOrders = ProductionOrder::all();
        $totalOrders = $productionOrders->count();
        $runningOrders = $productionOrders->where('status', 'Running')->count();
        $machineUtilization = 75; // Placeholder value

        $defectRate = Inspection::where('passed', 0)->count();
        $totalInspections = Inspection::count();
        $productDefectRate = $totalInspections > 0 ? ($defectRate / $totalInspections) * 100 : 0;

        // Data for charts
        $machineUtilizationData = [
            'labels' => ['Machine 1', 'Machine 2', 'Machine 3', 'Machine 4'],
            'data' => [85, 70, 90, 60],
        ];

        $defectRateData = [
            'labels' => ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            'data' => [5, 3, 6, 2],
        ];

        return view('dashboard', compact(
            'totalOrders',
            'runningOrders',
            'machineUtilization',
            'productDefectRate',
            'machineUtilizationData',
            'defectRateData'
        ));
    }
}
