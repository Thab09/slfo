<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerAchievement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
