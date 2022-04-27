<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    protected $fillable = ['user_id', 'block_after_rejection', 'block_after_delete', 'weather', 'dark_mode'];
    public $timestamps = false;
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
