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
        'birthdate',
        'gender',
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
    public function Friendships1()
    {
        return $this->belongsToMany(User::class, "friendships", "user1_id", "user2_id");
    }
    public function Friendships2()
    {
        return $this->belongsToMany(User::class, "friendships", "user2_id", "user1_id");
    }
    public function SentRequests()
    {
        return $this->belongsToMany(User::class, "friendinvitations", "sender_user_id","receiver_user_id");
    }
    public function ReceivedRequests()
    {
        return $this->belongsToMany(User::class, "friendinvitations", "receiver_user_id","sender_user_id");
    }
    public function RemainingTasks()
    {
        return $this->Level->Tasks()->whereNotIn('id', $this->belongsToMany(Task::class, "usertasks", "user_id", "task_id")->pluck('task_id'));
    }
    public function ActualTasks()
    {
        return $this->belongsToMany(Task::class, 'usertasks', 'user_id', 'task_id')->withPivot('status')->orderBy('id');
    }
    public function TeamMembers()
    {
        return $this->Team->Members()->orderByDesc('score');
    }
    public function UserSettings()
    {
        return $this->hasOne(UserSettings::class);
    }
    public function BlockedPeople()
    {
        return $this->belongsToMany(User::class, "blockedpeople", "blocker_user_id", "blocked_user_id");
    }
    public function BlockedBy()
    {
        return $this->belongsToMany(User::class, "blockedpeople", "blocked_user_id", "blocker_user_id");
    }
}
