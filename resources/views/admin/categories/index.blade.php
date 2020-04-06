@extends('layouts.admin')



@section('content')

       <div class="container">
               <div class="box">
                       <div class="col-lg-9">
                               <ol class="breadcrumb text-center">
                                     <span style="font-size: 20px;"><i class="fa fa-shopping-cart"></i> All Categories</span>
                               </ol>
                       </div>
               </div>
       </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        Add Categories
                    </h3>
                </div>
            </div>

            @if(Session::has('category_created'))

                <p class="alert-success">
                    {{session('category_created')}}
                </p>

                @endif


            <div class="panel-body">
                <div class="form-horizontal">
                    {!! Form::open(['method'=>'post','action'=>'AdminCategoriesController@store']) !!}

                    <div class="form-group">
                        {!! Form::label('name','Title') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group text-center">
                        {!! Form::button('<i class="fa fa-upload"></i> Create Category',['type'=>'submit','class'=>'btn btn-primary col-sm-6']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <style>
            .btn-primary {
                float: inherit;
            }
        </style>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        Categories
                    </h3>
                </div>
            </div>

            @if(Session::has('category_updated'))

                <p class="alert-success">
                    {{session('category_updated')}}
                </p>

                @endif


            @if(Session::has('deleted'))

                <p class="alert-danger">{{session('deleted')}}</p>

            @endif

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <td style="color: blue;">Id</td>
                            <td style="color: maroon;">Name</td>
                            <td style="color: darkgreen">Created At</td>
                            <td style="color: purple">Updated At</td>
                            <td style="color: red;">Action</td>
                        </tr>
                        </thead>
                        <tbody>

                        @if($categories)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                                    <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'OOPS'}}</td>
                                    <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'OOPS'}}</td>
                                    <td>

                                        {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}

                                            <div class="form-group">
                                                {!! Form::button('<i class="fa fa-trash-o"></i> Delete',['type'=>'submit','class'=>'btn btn-danger']) !!}
                                            </div>

                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


       <div class="row">
           <div class="col-sm-6 col-sm-offset-5">
               {{$categories->render()}}
           </div>
       </div>



@stop