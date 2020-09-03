<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Test extends Model
{
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'test_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'test_id');
    }

    public static function add($fields)
    {
    	$test = new static;
    	$test->fill($fields);
    	$test->teacher_id = Auth::user()->id;
    	$test->save();
    	return $test;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove($id)
    {
        Question::where('test_id', '=', $id)->delete();
        Answer::where('test_id', '=', $id)->delete();
        $this->delete();
    }
}
