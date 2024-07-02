<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lecturer extends Model
{
    use HasFactory;

    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function courses():BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'courses_has_lecturers');
    }

    public function assignments():HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function exams():HasMany
    {
        return $this->hasMany(Exam::class);
    }

    public function program():BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
