<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function cycles()
    {
        return $this->hasMany(Task::class);
    }
}
