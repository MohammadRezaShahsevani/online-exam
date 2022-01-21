<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
   
    

    protected $table='users';
    protected $fillable=['firstname','lastname','birth_date',
    'gender','national_code','email','password','role','confirmation'];

    public function course(){

        return $this->belongsToMany(Course::class);
    }

    public function courses(){

        return $this->belongsToMany(Course::class);
    }

    public function hasRole($role){

        return $this->role == $role;
    }
}
