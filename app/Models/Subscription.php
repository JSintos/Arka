<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $primaryKey = 'subscriptionId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'userId', 
        'referenceNumber', 
        'phoneNumber',
        'subscriptionDate',
        'expirationDate',
        'isConfirmed'
    ];
}
