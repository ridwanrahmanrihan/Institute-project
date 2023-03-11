<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function projectRelation()
    {
        return $this->belongsToMany(Department::class, 'department_project', 'project_id','department_id')->withTimestamps();
    }
}
