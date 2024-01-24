<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends Model
{
    use HasFactory;

    public string $color = 'primary';
    public string $faIcon = 'fa fa-file';
    public string $route = 'documentLearner';

    protected $guarded = [];


    public function Files(): BelongsToMany
    {
        return $this->belongsToMany(File::class)
            ->withPivot('order', 'id')
            ->orderBy('order')
            ->withTimestamps();
    }

    public function Sessions(): MorphTo
    {
        return $this->morphTo(Session::class);
    }
}
