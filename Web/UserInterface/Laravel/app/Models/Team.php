<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ["name", "score", "leader_id"];
    public function Members()
    {
        return $this->hasMany(User::class, "team_id");
    }
    public function Leader()
    {
        return $this->hasOne(User::class, "leader_id");
    }
    public function Score()
    {
        return User::where('team_id', $this->id)->pluck('score')->sum();
    }
}
