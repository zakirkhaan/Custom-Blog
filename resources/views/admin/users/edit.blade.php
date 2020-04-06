@extends('layouts.admin')



@section('content')

    <h1 style="text-align: center; color: darkblue;">Edit User</h1>
    
    <div class="col-sm-3">
        <img class="img-responsive img-circle" src="{{$user->photo ? $user->photo->file : 'There Is no photo'}}" alt="">
    </div>
    
    
    
    <div class="col-sm-9">

    {!! Form::model($user,['method'=>'PUT', 'action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
                                {{@csrf_field()}}


    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id', $roles,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active',[1 =>'Active',0=>'Not Active'],null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Photo:') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>

    <div class="form-group text-center">
        {!! Form::submit('Update User',['class'=>'btn btn-primary btn-lg  ']) !!}
    </div>


    {!! Form::close() !!}

    </div>



    <div class="row">
        <div class="col-sm-6">
        @include('includes.errors')
        </div>
    </div>

@stop





