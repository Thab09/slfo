<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\Player;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TeamAchievement;

class TeamShowTable extends Component
{
    use WithPagination;
    public $team_id;

    public $viewType = 'players';


    public function mount(Team $team)
    {
        $this->team_id = $team->id;
    }

    public function render()
    {
        $data = $this->viewType == 'players' ? $this->getTeamPlayers() : $this->getTeamAchievements();
        return view('livewire.team-show-table', compact('data'));
    }

    public function switchViewType($type)
    {
        $this->viewType = $type;
    }

    public function getTeamPlayers()
    {
        return Player::where('team_id', $this->team_id)->orderBy('id', 'desc')->paginate(10);
    }

    public function getTeamAchievements()
    {
        return TeamAchievement::where('team_id', $this->team_id)->orderBy('id', 'desc')->paginate(10);
    }
}
