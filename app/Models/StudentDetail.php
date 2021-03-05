<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;
    public $table='student_detail';

    protected $fillable = [
        'First_name',
        'Last_name',
        'Course_id',
        'Date_of_joining',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,  'Course_id');
    }
}
