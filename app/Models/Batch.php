<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'batches';
    protected $fillable = ['name', 'course_id', 'start_date'];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function enrollments()
    {
        return $this->belongsTo(Enrollment::class, 'name');
    }
}
