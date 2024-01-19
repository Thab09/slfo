<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class TeamIndexTable extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $teams = $this->search ? $this->searchTeam($this->search) : $this->getAllTeams();
        return view('livewire.team-index-table', compact('teams'));
    }

    public function searchTeam($search)
    {
        return Team::where('name', 'like', '%' . $search . '%')
            ->paginate(10);
    }

    public function getAllTeams()
    {
        return Team::orderBy('id', 'desc')->paginate(10);
    }
}
