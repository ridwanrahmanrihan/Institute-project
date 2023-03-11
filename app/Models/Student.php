<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function studenRelation()
    {
        return $this->belongsToMany(Department::class, 'department_student', 'student_id','department_id')->withTimestamps();
    }
}
