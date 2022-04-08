<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $timestamps = false;
    protected $fillable = ["name"];
    public function Tasks()
    {
        return $this->hasMany(Task::class, 'level_id');
    }
    public function Users()
    {
        return $this->hasMany(User::class, 'level_id');
    }
}
