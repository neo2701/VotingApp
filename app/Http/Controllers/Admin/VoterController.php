<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $voters = Voter::all();
        return view('admin.voters.index', [
            'voters' => $voters
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
        $elections = Election::all();
        return view('admin.voters.create', [
            'elections' => $elections,
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
            'election' => 'required|exists:elections,id',
        ]);


        $store = [
            'name' => $validated['name'],
            'election_id' => $validated['election'],
            'voter_token' => strtoupper(Str::random(20)),
        ];
        // dd($store);
        Voter::create($store);
        return redirect()->route('admin.voters.index')->with('success', 'Voter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Voter $voter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        //
        $elections = Election::all();
        return view('admin.voters.edit', [
            'voter' => $voter,
            'elections' => $elections
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voter $voter)
    {
        //
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'election' => 'required|exists:elections,id',
        ]);


        $store = [
            'name' => $validated['name'],
            'election_id' => $validated['election'],
        ];
        // dd($store);
        $voter->update($store);
        return redirect()->route('admin.voters.index')->with('success', 'Voter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        //
    }
}
