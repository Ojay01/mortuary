<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corpse extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'cause_of_death',
        'paid',
        'relative_number',
        'identified',
        'qr_code',
        'brought_by_id',
        'removal_date',
        'status',
        'storage_id',
        'bill',
        'embalment_id',
        'freezer_id',
    ];
}
