<?php

namespace App\Http\Controllers\Admin;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PlayerAchievement;
use App\Http\Controllers\Controller;

class PlayerAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.teamachievement.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.playerachievement.create', [
            'players' => Player::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formInputs = $request->validate([
            'achievement' => ['required', 'max:255'],
            'player_id' => ['array', Rule::exists('players', 'id')],
            'year' => ['nullable'],
        ]);

        $players = request(['player_id']);
        foreach ($players['player_id'] as $player_id) {

            $formInputs['player_id'] = $player_id;
            PlayerAchievement::create($formInputs);
        }


        return redirect()->route('admin.playerachievements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PlayerAchievement $playerAchievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlayerAchievement $playerachievement)
    {
        return view('admin.playerachievement.edit', [
            'achievement' => $playerachievement,
            'players' => Player::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlayerAchievement $playerachievement)
    {
        $formInputs = $request->validate([
            'achievement' => ['required', 'max:255'],
            'player_id' => [Rule::exists('players', 'id')],
            'year' => ['nullable'],
        ]);

        $playerachievement->update($formInputs);

        return redirect()->route('admin.playerachievements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlayerAchievement $playerAchievement)
    {
        $playerAchievement->delete();

        return back();
    }
}
