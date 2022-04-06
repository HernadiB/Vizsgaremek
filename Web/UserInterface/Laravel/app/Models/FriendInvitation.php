<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendInvitation extends Model
{
    protected $fillable = ['sender_user_id', 'receiver_user_id'];
    public function SenderUser()
    {
        return $this->belongsTo(User::class, 'sender_user_id');
    }
    public function ReceiverUser()
    {
        return $this->belongsTo(User::class, 'receiver_user_id');
    }
}
