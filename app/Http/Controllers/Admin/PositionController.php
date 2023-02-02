<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return view('admin.positions.index', [
            'positions' => Position::all(),
            'elections' => \App\Models\Election::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validateWithBag('create', [
            'name' => 'required|string|max:50',
            'election_id' => 'required|exists:elections,id',
        ]);

        Position::create($validated);

        return redirect()->route('admin.positions.index')->with('success', 'Position created successfully.');
    }

    public function update(Request $request, Position $position)
    {
        $validated = $request->validateWithBag('edit.' . $position->id, [
            'name' => 'required|string|max:50',
            'election_id' => 'required|exists:elections,id',
        ]);

        $position->update($validated);

        return redirect()->route('admin.positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('admin.positions.index')->with('success', 'Position deleted successfully.');
    }
}
