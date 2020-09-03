<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('is_admin', 1)->get();
        return view('pages.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ball = 0;
        $count = $request->count;
        for ($i=1; $i <= $count; $i++) {
            $answer['id'] = $request->get('id'.$i);
            $answer['question'] = $request->get('question'.$i);
            $answer['answer'] = $request->get('answ'.$i);
            $useranswer = $request->get('answ'.$i);
            $correct = Question::where('id', $request->get('id'.$i))->first()->correct;
            if ($useranswer == $correct) {
                $ball = $ball + 2;
                $answer['javob'] = "correct answer";
            }else{
                $answer['javob'] = "wrong answer";
            }

            $answers[$i] = $answer;
        }
        $jsonasnwers = json_encode($answers);
        $answer = new Answer;
        $answer->teacher_id = $request->get('teacherid');
        $answer->test_id = $request->get('testid');
        $answer->student_id = Auth::user()->id;
        $answer->answers = $jsonasnwers;
        $answer->mark = $ball;
        $answer->save();
        return redirect()->route('result.show', ['testid' => $request->get('testid')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $teacher = User::find($id);

        $tests = Test::where('teacher_id', $id)->get();
        return view('pages.show', ['teacher' => $teacher, 'tests' => $tests]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test($id)
    {
        $userid = Auth::user()->id;
        $count = Answer::where('test_id', $id)->where('student_id', $userid)->count();
        if($count>0){
            return redirect()->route('result.show', ['testid' => $id]);

        }else{
            $teacherid = Test::where('id', $id)->first()->teacher_id;
            $questions = Question::where('test_id', $id)->get();
            return view('pages.list', ['questions' => $questions, 'testid' => $id, 'teacherid' => $teacherid]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function result($id)
    {
        $studid = Auth::user()->id;
        $answers = Answer::where('student_id', $studid)->where('test_id', $id)->first();
        $answ = $answers->answers;
        $testansws = json_decode($answ);
        return view('pages.result', ['testansws' => $testansws, 'answers' => $answers]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
