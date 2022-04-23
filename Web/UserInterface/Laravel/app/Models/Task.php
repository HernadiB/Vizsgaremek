<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    protected $fillable = ["name", "description", "image", "score", "level_id"];
    public function Users()
    {
        return $this->belongsToMany(User::class, "usertasks", "task_id", "user_id");
    }
    public function Level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
