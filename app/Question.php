<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['test_id', 'question', 'a', 'b', 'c', 'correct'];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public static function add($fields)
    {
    	$question = new static;
    	$question->fill($fields);
    	$question->save();
    	return $question;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
