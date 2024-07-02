<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function lecturers(): HasMany
    {
        return $this->hasMany(Lecturer::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
