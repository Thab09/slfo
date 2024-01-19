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
        return '/images/slfowolf.svg';
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function achievements()
    {
        return $this->hasMany(TeamAchievement::class);
    }
}
