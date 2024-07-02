<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Assignment extends Model
{
    use HasFactory;

    public function course():BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer():BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function students():BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'assignment_student');
    }
}
