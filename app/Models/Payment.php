<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $fillable = ['enrollments_id', 'paid_date', 'amount'];

    public function enrollments()
    {
        return $this->belongsTo(Enrollment::class, 'enrollments_id');
    }
}
