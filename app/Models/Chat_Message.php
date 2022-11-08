<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_Message extends Model
{
    use HasFactory;
    protected $fillable = ['messages'];
    protected $primaryKey = 'chatMessageId';

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
