<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Auth;
class QuestionController extends Controller
{
    public function store(Request $request){
        $q=new Question;
        $q->title=$request->title;
        $q->body=$request->body;
        $q->user_id=auth()->user()->id;
        $q->save();



    }

    public function show($id){
        $question=Question::findorfail($id);

        return view('forum.questions.showOne')->with('question',$question);
    }

    public function add(){
        dd ("dd");
       // return view('forum.questions.add');
    }

    public function all(){
        $questions=Question::all();
        return view('forum.questions.all')->with('questions',$questions);
    }

    public function ng_get(){
       $questions=Question::all();

       return response()->json(
           ['questions'=>$questions],
           200
       );
    }
}
