<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class StudentProfile extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use HasRoles;
    protected $fillable = ['firstname', 'othernames', 'lastname', 'email', 'password', 'phone', 'students_id'];
    protected $table = 'studentprofile';
    public function student()
    {
        return $this->belongsTo(Student::class, 'students_id');
    }
}
