<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\TeamAchievement;
use Illuminate\Validation\Rule;

class TeamAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teamachievement.index', [
            'teamachievements' => TeamAchievement::latest('created_at')->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teamachievement.create', [
            'teams' => Team::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formInputs = $request->validate([
            'achievement' => ['required', 'max:255'],
            'team_id' => ['required', Rule::exists('teams', 'id')],
            'year' => ['nullable'],
        ]);

        TeamAchievement::create($formInputs);

        return redirect()->route('admin.teamachievements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamAchievement $teamAchievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamAchievement $teamachievement)
    {
        return view('teamachievement.edit', [
            'teamachievement' => $teamachievement,
            'teams' => Team::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamAchievement $teamachievement)
    {
        $formInputs = $request->validate([
            'achievement' => ['required', 'max:255'],
            'team_id' => ['required', Rule::exists('teams', 'id')],
            'year' => ['nullable'],
        ]);

        $teamachievement->update($formInputs);

        return redirect()->route('admin.teamachievements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamAchievement $teamachievement)
    {
        //
    }
}
