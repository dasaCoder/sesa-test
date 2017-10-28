<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use App\Comments;
use App\Auth;
use App\Blog;
use App\Question;
//use Illuminate\Routing\Route;

class CommentsController extends Controller
{
   public function store(Request $request){

       $blog=Blog::find($request->blog_id);

       $comment=new Comments;
       $comment->body=$request->body;
       $comment->user_id=auth()->user()->id;
      /* $comment->commentable_type=

       $comment->commentable_id=$request->blog_id;*/
       $comment=$blog->comments()->save($comment);
       return redirect('blog/show/'.$request->blog_id.'#comments');
   }

    public function edit($id,Request $request){
        $comment=Comments::findorfail($id);
        $comment->update($request->all());

        return response()->json(
          $comment->body
        );
    }

    public function delete($id,Request $request){
        $comment=Comments::findorfail($id);
        $comment->delete();
        return response()->json(
            'Deleted'
        );
    }


   //// answer is also consider as comment
   public function answerStore(Request $request){
       $comment=new Comments;
       $comment->body=$request->body;
       $comment->user_id=auth()->user()->id;

       $question=Question::find($request->question_id);

       $comment=$question->comments()->save($comment);
       return redirect('forum/question/show/'.$request->question_id.'#answers');
   }
}
