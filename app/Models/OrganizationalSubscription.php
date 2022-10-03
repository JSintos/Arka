<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationalSubscription extends Model
{
    use HasFactory;

    protected $primaryKey ='organizationalId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'fullName', 
        'emailAddress', 
        'companyName',
        'companySize',
        'country',
        'details'
    ];
}
