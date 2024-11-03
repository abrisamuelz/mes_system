<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\ProductionOrder;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    public function index()
    {
        $inspections = Inspection::with('productionOrder')->get();
        return view('inspections.index', compact('inspections'));
    }

    public function create()
    {
        $productionOrders = ProductionOrder::all();
        return view('inspections.create', compact('productionOrders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'production_order_id' => 'required|exists:production_orders,id',
            'scheduled_date' => 'required|date',
        ]);

        Inspection::create($request->all());

        return redirect()->route('inspections.index')
            ->with('success', 'Inspection scheduled successfully.');
    }

    public function edit(Inspection $inspection)
    {
        return view('inspections.edit', compact('inspection'));
    }

    public function update(Request $request, Inspection $inspection)
    {
        $request->validate([
            'inspection_date' => 'nullable|date',
            'results' => 'nullable',
            'passed' => 'nullable|boolean',
        ]);

        $inspection->update($request->all());

        return redirect()->route('inspections.index')
            ->with('success', 'Inspection updated successfully.');
    }

    public function destroy(Inspection $inspection)
    {
        $inspection->delete();

        return redirect()->route('inspections.index')
            ->with('success', 'Inspection deleted successfully.');
    }
}
