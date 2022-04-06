<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ["name", "description", "score", "level_id"];
    public function UserTasks()
    {
        return $this->hasMany(UserTask::class, 'task_id');
    }
    public function Level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
