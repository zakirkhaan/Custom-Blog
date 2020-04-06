<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

protected $images = '/images/';



  protected $fillable = ['file'];

  public function getFileAttribute($photo){
    return $this->images .$photo;
  }












}
