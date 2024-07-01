<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollments';
    protected $primaryKey = 'id';
    protected $fillable = ['enroll_no', 'batch_id', 'student_id', 'join_date', 'fee'];

    public function batches()
    {
        return $this->belongsTo(Batch::class,'batch_id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'enrollment_id');
    }
}
