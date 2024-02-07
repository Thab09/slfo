<?php

namespace App\Http\Controllers;

use App\Livewire\Achievements;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamAchievement;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        return view('guest.home', [
            'teams' => Team::latest()->limit(4)->get()
        ]);
    }

    public function teams()
    {
        return view('guest.teams', [
            'teams' => Team::where('status', 'active')->get()
        ]);
    }

    public function team(Team $team)
    {
        return view('guest.team', [
            'team' => $team
        ]);
    }

    public function players()
    {
        return view('guest.players', [
            'players' => Player::where('status', 'active')->paginate(16)
        ]);
    }

    public function achievements()
    {
        return view('guest.achievements', [
            'achievements' => TeamAchievement::latest('year', 'desc')->get()
        ]);
    }
}
