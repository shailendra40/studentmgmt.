<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;         //this is add for slug

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'mobile', 'slug'];

protected static function boot()    // this is add for slug
    {
        parent::boot();

        static::creating(function ($student) {
            $student->slug = Str::slug($student->name);
        });

        static::updating(function ($student) {
            $student->slug = Str::slug($student->name);
        });
    }
}
