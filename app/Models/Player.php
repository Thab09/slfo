<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getProfilePicture()
    {
        if ($this->profile_picture) {
            return url('storage/' . $this->profile_picture);
        }
        return '/images/slfowolf.svg';
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function achievements()
    {
        return $this->hasMany(PlayerAchievement::class);
    }
}
