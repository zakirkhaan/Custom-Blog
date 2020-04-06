<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Image;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      $posts = Post::paginate(4);

      return view('admin.posts.index',compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $categories = Category::pluck('name','id')->all();
      return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        //

      //fetching all the input fields from the request
      $input = $request->all();
      //checking for the user_id of the logged in user
      $user = Auth::user();
      //checking for the file,if it exist
      if ($file = $request->file('photo_id')){
        //fetching the file name with the carbon date and time
        $name = time() . $file->getClientOriginalName();
        //moving the file to the directory
        $file->move('images',$name);
        //creating the image
        $photo = Image::create(['file'=>$name]);
        //assigning the photo id and sending that
        $input['photo_id'] = $photo->id;

      }
      //so creating the posts for the logged in user
      $user->posts()->create($input);
      //showing the flash session msg
      Session::flash('post_created','Post Has been added Successfully');
      //redirecting the logged in user back to the posts page
      return redirect('/admin/posts');

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


      $post = Post::findOrFail($id);

      $categories = Category::pluck('name','id')->all();

      return view('admin.posts.edit',compact('post','categories'));


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

      $input = $request->all();

      if ($file = $request->file('photo_id')){
        //fetching the file name with carbon time and date
        $name = time() . $file->getClientOriginalName();
        //moving the file to the images folder
        $file->move('images',$name);
        //now creating and image//
        $photo = Image::create(['file'=>$name]);
        //assigning photo_id to the input
        $input['photo_id'] = $photo->id;

      }

      Auth::user()->posts()->whereId($id)->first()->update($input);

      Session::flash('updated_post','Post Has been Updated Successfully');

      return redirect('/admin/posts');

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

        $post = Post::findOrFail($id);

        unlink(public_path() .$post->photo->file);

        $post->delete();

        Session::flash('deleted_post','Post Has been deleted Successfully');

        return redirect('/admin/posts');

    }


}
