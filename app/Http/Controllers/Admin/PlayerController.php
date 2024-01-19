<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\Player;
use App\Models\PlayerAchievement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.player.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.player.create', [
            'teams' => Team::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formInputs = $request->validate([
            'name' => ['nullable', 'max:64'],
            'ign' => ['required', 'max:32'],
            'role' => ['required'],
            'team_id' => [Rule::exists('teams', 'id')],
            'is_leader' => ['required', 'boolean'],
            'status' => ['required'],
            'profile_picture' => ['nullable', 'image'],
        ]);

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('pp', 'public');
            $formInputs['profile_picture'] = $imagePath;
        }

        Player::create($formInputs);

        return redirect()->route('admin.players.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return view('admin.player.show', [
            'player' => $player,
            'achievements' => PlayerAchievement::where('player_id', $player->id)->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        return view('admin.player.edit', [
            'player' => $player,
            'teams' => Team::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $formInputs = $request->validate([
            'name' => ['nullable', 'max:64'],
            'ign' => ['required', 'max:32'],
            'role' => ['required'],
            'team_id' => [Rule::exists('teams', 'id')],
            'is_leader' => ['required', 'boolean'],
            'status' => ['required'],
            'profile_picture' => ['nullable', 'image'],
        ]);

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('pp', 'public');
            $formInputs['profile_picture'] = $imagePath;
        }

        $player->update($formInputs);

        return redirect()->route('admin.players.show', $player);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return back();
    }
}
