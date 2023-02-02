<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\Vote;
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date|after:starts_at',
        ]);

        Election::create($validated);

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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date|after:starts_at',
        ]);

        $election->update($validated);

        return redirect()->route('admin.elections.index');
    }

    public function destroy(Election $election)
    {
        $election->delete();

        return redirect()->route('admin.elections.index');
    }

    public function deleteVotes(Election $election)
    {
        Vote::where('election_id', $election->id)->delete();
        return redirect()->route('admin.elections.index')->with('success', 'Election votes deleted successfully.');
    }
}
