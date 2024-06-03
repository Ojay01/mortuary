<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Embalmment extends Model
{
    use HasFactory;

     protected $fillable = [
        'location',
        'name',
        'status',
        'capacity',
    ];
}
