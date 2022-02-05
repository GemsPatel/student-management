<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['roll_number', 'name','class', 'score', 'avtar'];

    public function mark(){
        return $this->hasMany( Mark::class, 'student_id', 'id')->with('subject');
    }
}
