<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Position;
use App\Models\Vote;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.candidates.index', [
            'candidates' => candidate::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $positions = Position::all();
        $elections = Election::all();
        return view('admin.candidates.create', [
            'positions' => $positions,
            'elections' => $elections
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'position' => 'required|exists:positions,id',
            'election' => 'required|exists:elections,id',

        ]);
        // dd($validated);
        $store = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'position_id' => $validated['position'],
            'election_id' => $validated['election'],
        ];
        // dd($store);
        Candidate::create($store);
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //

        $positions = Position::all();
        $elections = Election::all();
        return view('admin.candidates.edit', [
            'candidate' => $candidate,
            'elections' => $elections,
            'positions' => $positions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'position' => 'required|exists:positions,id',
            'election' => 'required|exists:elections,id',

        ]);

        $store = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'position_id' => $validated['position'],
            'election_id' => $validated['election'],
        ];
        // dd($validated, $store);
        // dd($validated);
        $candidate->update($store);

        return redirect()->route('admin.candidates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
        $candidate->delete();
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate deleted successfully.');
    }

    public function deleteVotes(Election $election)
    {
        Vote::where('election_id', $election->id)->delete();
        return redirect()->route('admin.elections.index')->with('success', 'Votes deleted successfully.');
    }
}
