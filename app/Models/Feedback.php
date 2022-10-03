<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $primaryKey = 'feedbackId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillabele = [
        'userId',
        'dateFeedbackAnswered',
        'type',
        'firstQuestionRating',
        'secondQuestionRating',
        'thirdQuestionRating',
        'fourthQuestionRating'
    ];
}
