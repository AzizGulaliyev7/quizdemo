<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
    public function index1()
{
    $userid = Auth::user()->id;
    $tests = Test::where('teacher_id', $userid)->get();
    return view('admin.results.testlist', ['tests' => $tests]);
}

public function index2($id)
{

    $results = Answer::where('test_id', $id)->get();
    return view('admin.results.resultlist', ['results' => $results]);
}

}
