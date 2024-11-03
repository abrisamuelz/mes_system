<?php

namespace App\Http\Controllers;

use App\Models\ProductionOrder;
use Illuminate\Http\Request;

class ProductionOrderController extends Controller
{
    public function index()
    {
        $orders = ProductionOrder::all();
        return view('production_orders.index', compact('orders'));
    }

    public function create()
    {
        return view('production_orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_number' => 'required|unique:production_orders',
            'product_name' => 'required',
            'quantity' => 'required|integer',
        ]);

        ProductionOrder::create($request->all());

        return redirect()->route('production_orders.index')
            ->with('success', 'Production order created successfully.');
    }

    public function show(ProductionOrder $productionOrder)
    {
        return view('production_orders.show', compact('productionOrder'));
    }

    public function edit(ProductionOrder $productionOrder)
    {
        return view('production_orders.edit', compact('productionOrder'));
    }

    public function update(Request $request, ProductionOrder $productionOrder)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|integer',
            'status' => 'required',
        ]);

        $productionOrder->update($request->all());

        return redirect()->route('production_orders.index')
            ->with('success', 'Production order updated successfully.');
    }

    public function destroy(ProductionOrder $productionOrder)
    {
        $productionOrder->delete();

        return redirect()->route('production_orders.index')
            ->with('success', 'Production order deleted successfully.');
    }
}
