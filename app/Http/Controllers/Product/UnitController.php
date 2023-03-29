<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UnitController extends Controller
{
    public function index()
    {
        return Inertia::render('Unit/UnitList', [
            'units' => Unit::all()
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Unit::create($data);
    }
    public function update(Request $request)
    {
        $unit = Unit::find($request->id);
        $unit->name = $request->name;
        $unit->update();
    }
    public function delete($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
    }
}
