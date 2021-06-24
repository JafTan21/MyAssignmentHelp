<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subject_code',
        'description',
        'deadline',
        'number_of_pages',
        'status'
    ];
}
