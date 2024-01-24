<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public string $color = 'danger';
    public string $faIcon = 'fa fa-file';
    public string $route = 'fileLearner';

    protected $guarded = [];


}
