<?php

namespace App\Livewire;

use App\Models\Player;
use Livewire\Component;

class MultiSelect extends Component
{
    public $selectedOptions = [];
    public $search = '';
    public $players = [];

    protected $listeners = ['toggleCheckbox'];

    public function render()
    {
        // Fetch players from the database based on the search term
        $this->players = $this->search
            ? Player::where('name', 'like', '%' . $this->search . '%')->get()
            : Player::all();


        return view('livewire.multi-select');
    }

    public function toggleCheckbox($name, $id)
    {
        if (in_array($id, $this->selectedOptions)) {
            $this->selectedOptions[$id] = $name;
        } else {
            unset($this->selectedOptions[$id]);
        }
    }
}
