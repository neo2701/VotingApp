<?php

namespace App\Http\Controllers\Election;

use App\Models\Election;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vote;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('election.index', [
            'elections' => Election::orderBy('created_at', 'desc')->get(),
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        //
        // session()->flash('success', 'Election created successfully.');
        return view('election.show', [
            'election' => $election,


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        //
    }

    public function voteindex($id)
    {
        $election = Election::find($id);
        // dd($election);
        return view('election.vote.index', [
            'election' => $election,
        ]);
    }

    public function vote(Request $request, $id)
    {

        $election = Election::find($id);
        $validate = $request->validate([
            'position' => 'required|exists:positions,id',
            'candidate' => 'required|exists:candidates,id',
        ]);
        // dd($validate);
        $vote = new Vote;
        $vote->election_id = $election->id;
        $vote->candidate_id = $validate['candidate'];
        $vote->save();
        return view('election.vote.success', [
            'election' => $election,
        ]);
    }
}
