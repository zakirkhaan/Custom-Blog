<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentsRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    public function createReply(Request $request)
    {

      $user = Auth::user();

      $data = [

        'comment_id' => $request->comment_id,
        'author' => $user->name,
        'email' => $user->email,
        'photo' => $user->photo->file,
        'body' => $request->body
      ];

      CommentReply::create($data);

      Session::flash('reply_msg','Your Feedback has been submitted and is waiting for approval');

      return redirect()->back();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

      $comment = Comment::findOrFail($id);

      $replies = $comment->replies;

      return view('admin.comments.replies.show',compact('replies'));



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

      CommentReply::findOrFail($id)->update($request->all());

      Session::flash('approve_msg','Hmm! It looks like You have updated the status of the reply');

      return redirect()->bacK();

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

      CommentReply::findOrFail($id)->delete();

      Session::flash('deleted','Instead Of approving or declining the reply,You just deleted that');

      return redirect()->back();

    }
}
