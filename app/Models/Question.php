<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $fillable = ['title', 'text', 'type'];

    public function exams()
    {

        return $this->belongsToMany(Exam::class);
    }

    public function opstions()
    {

        return $this->hasMany(Option::class);
    }
}
