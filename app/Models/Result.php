<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function resultRelation()
    {
        return $this->belongsToMany(Department::class, 'department_result', 'result_id','department_id')->withTimestamps();
    }
}
