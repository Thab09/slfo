<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getLogo()
    {
        if ($this->logo) {
            return url('storage/' . $this->logo);
        }
        return null;
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
