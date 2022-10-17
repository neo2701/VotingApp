<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index()
    {
        return view('admin.elections.index', [
            'elections' => Election::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function show(Election $election)
    {
        return view('admin.elections.show', [
            'election' => $election,
        ]);
    }

    public function create()
    {
        return view('admin.elections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date|after:starts_at',
        ]);

        Election::create([
            'title' => $request->title,
            'description' => $request->description,
            'starts_at' => $request->starts_at,
            'ends_at' => $request->ends_at,
        ]);

        return redirect()->route('admin.elections.index');
    }

    public function edit(Election $election)
    {
        return view('admin.elections.edit', [
            'election' => $election,
        ]);
    }

    public function update(Request $request, Election $election)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date|after:starts_at',
        ]);

        $election->update([
            'title' => $request->title,
            'description' => $request->description,
            'starts_at' => $request->starts_at,
            'ends_at' => $request->ends_at,
        ]);

        return redirect()->route('admin.elections.index');
    }

    public function destroy(Election $election)
    {
        $election->delete();

        return redirect()->route('admin.elections.index');
    }
}
