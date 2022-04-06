<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable = ["user1_id", "user2_id"];
    public function UserA()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }
    public function UserB()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }

}
