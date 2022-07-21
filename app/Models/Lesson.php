<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'lesson',
        'description',
        'calendar_id'
    ];

    const TYPES = [
        'RUMBA' => 'RUMBA',
        'GAP' => 'GAP',
        'CROSSTECH' => 'CROSSTECH',
        'YOGA' => 'YOGA',
        'COMBAT' => 'COMBAT',
        'HIIT' => 'HIIT',
        'STEP' => 'STEP',
        'CYCLING' => 'CYCLING',
        'PILATES' => 'PILATES',
        'SUPERABS' => 'SUPERABS',
        'PUMP' => 'PUMP'
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
