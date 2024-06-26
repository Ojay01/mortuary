<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freezer extends Model
{
    use HasFactory;

     protected $fillable = [
        'location',
        'name',
        'status',
    ];

    public function corpses()
    {
        return $this->hasMany(Corpse::class, 'freezer_id');
    }
}
