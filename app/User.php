<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class, 'teacher_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


    public static function add($fields)
    {
       $user = new static;
       $user->fill($fields);
       $user->save();
       return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword($password)
    {
        if ($password!=null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function remove($id)
    {
        Answer::where('student_id', '=', $id);
        $this->delete();
    }
}
