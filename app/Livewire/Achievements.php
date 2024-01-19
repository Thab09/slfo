<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TeamAchievement;
use App\Http\Controllers\TeamAchievementController;
use App\Http\Controllers\PlayerAchievementController;
use App\Models\PlayerAchievement;

class Achievements extends Component
{
    public $viewType = 'team'; // Default view type

    public function render()
    {
        $achievements = $this->viewType == 'team' ? $this->getTeamAchievements() : $this->getPlayerAchievements();
        return view('livewire.achievements', compact('achievements'));
    }

    public function switchViewType($type)
    {
        $this->viewType = $type;
    }

    private function getTeamAchievements()
    {
        // Call TeamAchivementController method to retrieve team achievements
        return TeamAchievement::orderBy('id', 'desc')->paginate(15);
    }

    private function getPlayerAchievements()
    {
        // Call PlayerAchivementController method to retrieve player achievements
        return PlayerAchievement::orderBy('id', 'desc')->paginate(15);
    }
}
