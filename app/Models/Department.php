<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    public function departmentRelation()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'department_id')->withTimestamps();
    }
    public function studenRelation()
    {
        return $this->belongsTo(Student::class, 'student_id', 'department_id')->withTimestamps();
    }
    public function resultRelation()
    {
        return $this->belongsTo(Result::class, 'result_id', 'department_id')->withTimestamps();
    }
    public function routineRelation()
    {
        return $this->belongsTo(Routine::class, 'routine_id', 'department_id')->withTimestamps();
    }
    public function projectRelation()
    {
        return $this->belongsTo(Project::class, 'project_id', 'department_id')->withTimestamps();
    }
    public function jobRelation()
    {
        return $this->belongsTo(Job::class, 'job_id', 'department_id')->withTimestamps();
    }
}
 