<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;

    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function courses():HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function students():HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function lecturers():HasMany
    {
        return $this->hasMany(Lecturer::class);
    }

}
