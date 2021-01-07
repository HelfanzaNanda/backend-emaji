<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    //protected $fillable = ['id', 'name', 'slug', 'image'];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
