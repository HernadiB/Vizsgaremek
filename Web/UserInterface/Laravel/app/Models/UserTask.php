<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    protected $fillable = ["user_id", "task_id", "is_done"];
    public function Task()
    {
        return $this->hasOne(Task::class, "task_id");
    }
    public function Users()
    {
        return $this->hasMany(User::class, "user_id");
    }
}
