<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function Course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function Participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot(["id", "role_id"]);
    }

    public function Sessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class)->withPivot(["id", "order"])->orderBy('order');
    }
}
