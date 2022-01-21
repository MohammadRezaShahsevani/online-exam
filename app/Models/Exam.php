<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table="exams";
    protected $fillable=['title','discription','start_at','end_at','status'];

    public function courses(){

        return $this->belongsToMany( Course::class );
    }

    public function questions(){

        return $this->belongsToMany( Question::class );
    }
}
