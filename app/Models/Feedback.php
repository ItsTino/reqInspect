<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    use HasFactory;

    protected $fillable = [
        'identifier',
        'type',
        'message',
    ];
}
