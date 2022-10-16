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
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validateWithBag('create_position', [
            'name' => 'required|string|max:50',
        ]);

        Position::create($validated);

        return redirect()->route('admin.positions.index');
    }

    public function edit(Position $position)
    {
        return view('admin.positions.edit', [
            'position' => $position,
        ]);
    }

    public function update(Request $request, Position $position)
    {
        $validated = $request->validateWithBag('update_position', [
            'name' => 'required|string|max:50',
        ]);

        $position->update($validated);

        return redirect()->route('admin.positions.index');
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('admin.positions.index');
    }
}
