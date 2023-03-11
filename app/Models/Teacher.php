<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function departmentRelation()
    {
        return $this->belongsToMany(Department::class, 'teacher_department', 'teacher_id','department_id')->withTimestamps();
    }
}
