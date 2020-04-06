@extends('layouts.admin')




@section('content')


    @include('includes.tinyeditor')
    <h1 class="text-center">Create a Post</h1>

    <div class="row">
        <div class="col-md-12">

    {!! Form::open(['method'=>'post','action'=>'AdminPostsController@store','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id',[''=>'Choose a Category'] + $categories,null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('photo_id','Photo') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Description:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>



    <div class="form-group text-center">
        {!! Form::submit('Create Post',['class'=>'btn btn-primary btn-lg']) !!}
    </div>

    {!! Form::close() !!}

        </div>
    </div>

    <div class="row">
        @include('includes.errors')
    </div>



@stop