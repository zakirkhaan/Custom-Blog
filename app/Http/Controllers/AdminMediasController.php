<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
  //

  public function index()
  {

    $photos = Image::all();

    return view('admin.media.index', compact('photos'));

  }

  public function create()
  {

    return view('admin.media.create');

  }

  public function store(Request $request)
  {

    $file = $request->file('file');
    $name = time() . $file->getClientOriginalName();

    $file->move('images', $name);

    Image::create(['file' => $name]);

  }

  public function destroy($id)
  {

    $photo = Image::findOrFail($id);

    unlink(public_path() . $photo->file);

    $photo->delete();

    Session::flash('deleted', 'Hmm ! Bruh You Have Deleted an image ? Are You Sure You did that?');

  }

  public function deleteMedia(Request $request)

  {

//    if (isset($request->delete_single)) {
//
//      $this->destroy($request->photo);
//
//      return redirect()->back();
//
//    }

    if (isset($request->delete_all) && !empty($request->checkBoxArray)) {

      $photos = Image::findOrFail($request->checkBoxArray);

      foreach ($photos as $photo) {

        $photo->delete();

      }
      Session::flash('deleted', 'Hmm ! Bruh You Have Deleted an image ? Are You Sure You did that?');
      return redirect()->back();

    } else {

      return redirect()->back();

    }

  }
}