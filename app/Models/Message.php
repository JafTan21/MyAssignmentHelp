<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function user_from()
    {
        return $this->belongsTo(User::class, 'user_from_id', 'id');
    }

    public function user_to()
    {
        return $this->belongsTo(User::class, 'user_to_id', 'id');
    }
}
