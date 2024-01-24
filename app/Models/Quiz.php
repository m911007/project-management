<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quiz extends Model
{
    use HasFactory;

    public string $color = 'warning';
    public string $faIcon = 'fa fa-question-circle';
    public string $route = 'quizLearner';

    protected $guarded = [];

    public function Questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class)
            ->withPivot('order', 'id', 'score')
            ->orderBy('order')
            ->withTimestamps();
    }

}
