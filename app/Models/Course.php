<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $fillable=['title','start','end','course_code'];

    public function teacher(){

        return $this->belongsToMany( User::class )->where("type","teacher");
    }

    public function student(){

        return $this->belongsToMany( User::class )->where("type","student");
    }

    public function exams(){

        return $this->belongsToMany( Exam::class );
    }
}
