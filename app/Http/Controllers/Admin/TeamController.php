<?php

namespace App\Http\Controllers\Admin;

use App\Models\Player;
use App\Models\Team;
use App\Models\TeamAchievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.team.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formInputs = request()->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable', 'min:10', 'max:1000'],
            'status' => ['required'],
            'logo' => ['nullable', 'image'],
        ]);

        if (request()->hasFile('logo')) {
            $imagePath = request()->file('logo')->store('logo', 'public');
            $formInputs['logo'] = $imagePath;
        }

        Team::create($formInputs);

        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.team.show', [
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', [
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {

        $formInputs = request()->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable', 'min:10', 'max:1000'],
            'status' => ['required'],
            'logo' => ['nullable', 'image'],
        ]);

        if (request()->hasFile('logo')) {
            $imagePath = request()->file('logo')->store('logo', 'public');
            $formInputs['logo'] = $imagePath;
        }

        $team->update($formInputs);

        return redirect()->route('admin.teams.show', $team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return back();
    }
}
