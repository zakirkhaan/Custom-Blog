@extends('layouts.admin')




@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        <span style="font-size: 20px;"><i class="fa fa-edit"></i>
                            Edit Categories
                        </span>
                    </h3>
                </div>
            </div>

            <div class="panel-body">
                {!! Form::model($categories,['method'=>'PUT','action'=>['AdminCategoriesController@update',$categories->id]]) !!}

                <div class="form-group">
                    {!! Form::label('name','Title:') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group text-center">
                  {!! Form::button('<i class="fa fa-edit"></i> Edit',['type'=>'submit','class'=>'btn btn-success col-md-6']) !!}
                </div>

                {!! Form::close() !!}
            </div>




        </div>
    </div>

    <style>
        .btn-success{
         float: inherit;
        }
    </style>



@stop