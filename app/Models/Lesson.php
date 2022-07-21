<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'lesson',
        'description',
        'calendar_id'
    ];

    const TYPES = [
        'RUMBA' => 'RUMBA',
        'CROSSTECH' => 'CROSSTECH',
        'YOGA' => 'YOGA',
        'COMBAT' => 'COMBAT',
        'HIIT' => 'HIIT',
        'STEP' => 'STEP',
        'CYCLING' => 'CYCLING',
        'PILATES' => 'PILATES',
        'SUPERABS' => 'SUPERABS',
    ];

    /**
     * Get all calendars availables
     * A lesson have relation with many calendars
    */
    public function calendars(): HasMany
    {
        return $this->hasMany(Calendar::class);
    }
}
