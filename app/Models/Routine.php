<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Routine extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function routineRelation()
    {
        return $this->belongsToMany(Department::class, 'department_routine', 'routine_id','department_id')->withTimestamps();
    }
}
