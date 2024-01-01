<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TeamAchievement;
use App\Http\Controllers\TeamAchievementController;
use App\Http\Controllers\PlayerAchievementController;

class Achievements extends Component
{
    public $viewType = 'player'; // Default view type

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
        return TeamAchievement::latest('created_at')->paginate(12);
    }

    private function getPlayerAchievements()
    {
        // Call PlayerAchivementController method to retrieve player achievements
        return TeamAchievement::latest('created_at')->paginate(12);
    }
}
