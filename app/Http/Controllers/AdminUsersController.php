<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Image;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $users = User::paginate(3);
      return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $roles = UserRole::pluck('name','id')->all();
      return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //

      if (trim($request->password == '')){
        $input = $request->except('password');
      }else {
        //first of all receiving all the data
        $input = $request->all();
        //hashing the password
        $input['password'] = bcrypt($request->password);
      }


      //checking for the file if it exists
      if ($file = $request->file('photo_id')){
        //getting the name of the file and appending with the carbon time
        $name = time() . $file->getClientOriginalName();
        //moving the file to images folder if there is one otherwise creating one
        $file->move('images',$name);
        //creating the folder first if there is not otherwise it will move the file to folder
        $photo = Image::create(['file'=>$name]);

        $input['photo_id'] = $photo->id;

      }



      User::create($input);

      Session::flash('user_created','User Has been Created Successfully');

       return redirect('admin/users');

       //lec213

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

      $user = User::findOrFail($id);
      $roles = UserRole::pluck('name','id')->all();

      return view('admin.users.edit',compact('user','roles'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
      $user = User::findOrFail($id);

      if (trim($request->password == '')){
          $input = $request->except('password');
      }else {
        $input = $request->all();

        $input['password'] = bcrypt($request->password);
      }


      if ($file = $request->file('photo_id')){

        $name = time() . $file->getClientOriginalName();

        $file->move('images',$name);

        $photo = Image::create(['file'=>$name]);

        $input['photo_id'] = $photo->id;

      }

      $user->update($input);

      Session::flash('user_update','The User Has been Updated Successfully');

      return redirect('/admin/users');

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
        $user = User::findOrFail($id);

        unlink(public_path() . $user->photo->file);

        $user->delete();

        Session::flash('deleted_user','This User Has been Deleted Successfully');

        return redirect()->back();
    }
}
