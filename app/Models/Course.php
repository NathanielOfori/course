<?php

namespace App\Models;

use App\Models\Program;
use App\Models\CourseMaterial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    public function program():BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function students():BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'courses_has_students');
    }

    public function lecturers():BelongsToMany
    {
        return $this->belongsToMany(Lecturer::class, 'courses_has_lecturers', 'course_id', 'lecturer_id');
    }

    public function assignments():HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function exams():HasMany
    {
        return $this->hasMany(Exam::class);
    }

    public function coursematerials():HasMany
    {
        return $this->hasMany(CourseMaterial::class);
    }
}
