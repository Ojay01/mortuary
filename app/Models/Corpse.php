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
        'country',
        'brought_by_id',
        'removal_date',
        'status',
        'bill',
        'embalment_id',
        'freezer_id',
    ];

    public function broughtBy()
    {
        return $this->belongsTo(BroughtInBy::class, 'brought_by_id');
    }

    public function embalmment()
    {
        return $this->belongsTo(Embalmment::class, 'embalment_id');
    }

    public function freezer()
    {
        return $this->belongsTo(Freezer::class, 'freezer_id');
    }
}
