@extends('layouts.admin')



@section('content')

    <h1 class="text-center">Edit Posts</h1>
    <div class="row">
    <div class="col-sm-2">
        <img class="img-responsive img-circle" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="">
    </div>


        <div class="col-sm-10">
            {!! Form::model($post,['method'=>'PUT','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('title','Title:') !!}
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id','Category:') !!}
                    {!! Form::select('category_id', $categories ,null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body','Description:') !!}
                    {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id','Photo:') !!}
                    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group text-center">
                    {!! Form::submit('Update Post',['class'=>'btn btn-primary']) !!}
                </div>



            {!! Form::close() !!}
        </div>
    </div>



@stop