<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Workout extends Model
{
    // use HasFactory, Compoships;
    use HasFactory;

    protected $guarded = [];


    public function scopeCompleted()
    {
        return $this->update([
            'is_completed' => 1,
            'score' => 100,
            'date_get_score' => Carbon::now()->format("Y-m-d")
        ]);
    }

    public function Sessionable():BelongsTo
    {
        return $this->belongsTo(Sessionable::class);
    }

    public function Session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function WorkOutQuiz():HasMany
    {
        return $this->hasMany(WorkoutQuizLog::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function Participant(): HasOne
    {
        return $this->hasOne(Participant::class);
    }
}
