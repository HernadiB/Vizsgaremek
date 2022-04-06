<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'role',
        'profile_picture',
        'score',
        'team_id',
        'level_id'
    ];
    public $timestamps = false;
    public function Team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function Level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function UserTasks()
    {
        return $this->hasMany(UserTask::class, 'user_id');
    }
    public function Friendships()
    {

    }
    public function FriendInvitations()
    {

    }
}
