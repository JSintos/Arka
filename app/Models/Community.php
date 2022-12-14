<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $primaryKey = 'communityId';

    protected $fillable = [
        'communityName'
    ];
    
    public function chatMessages(){
        return $this->hasMany(Chat_Message::class);
    }
}
