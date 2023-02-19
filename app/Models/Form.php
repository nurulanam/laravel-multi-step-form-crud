<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'name',
        'password',
        'address_line_1',
        'address_line_2',
        'city',
        'zip_code',
        'country',
        'job_title',
        'job_description',
        'profile_image',
        'document',
    ];
}
