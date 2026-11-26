<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'owner_id', 'name', 'species', 'breed',
        'gender', 'birth_date', 'weight', 'notes',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
