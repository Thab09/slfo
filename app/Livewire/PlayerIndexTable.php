<?php

namespace App\Livewire;

use App\Models\Player;
use Livewire\Component;
use Livewire\WithPagination;

class PlayerIndexTable extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $players = $this->search ? $this->searchPlayer($this->search) : $this->getAllPlayers();
        return view('livewire.player-index-table', compact('players'));
    }

    public function searchPlayer($search)
    {
        return Player::where('name', 'like', '%' . $search . '%')
            ->orWhere('ign', 'like', '%' . $search . '%')
            ->paginate(10);
    }

    public function getAllPlayers()
    {
        return Player::orderBy('id', 'desc')->paginate(10);
    }
}
