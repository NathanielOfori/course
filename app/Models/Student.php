<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;

class Student extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['indexnumber', 'level', 'department_id', 'program_id'];

    public function profile()
    {
        return $this->hasOne(StudentProfile::class, 'students_id');
    }

    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function program():BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function courses():BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'courses_has_students');
    }

    public function assignments():BelongsToMany
    {
        return $this->belongsToMany(Assignment::class, 'assignments_has_students');
    }

    public function exams():BelongsToMany
    {
        return $this->belongsToMany(Exam::class, 'exams_has_students');
    }
}
