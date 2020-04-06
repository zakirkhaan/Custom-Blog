@extends('layouts.admin')




@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        <span style="font-size: 20px">
                            <i class="fa fa-comments">
                            </i> Post Comments
                        </span>
                    </h3>
                </div>
            </div>





            @if(Session::has('approve_msg'))

                <p class="alert-success">
                    {{session('approve_msg')}}
                </p>

            @endif

            @if(count($replies) >0)


                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="color: green;">Id</th>
                                <th style="color: blue;">Author</th>
                                <th style="color: #2e6da4">Author Email</th>
                                <th style="color: purple;">Body</th>
                                <th style="color: maroon;">View Post</th>
                                <th style="color: darkcyan;">Created at</th>
                                <th style="color:darkblue">Status</th>
                                <th style="color: red;">Delete</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($replies as $reply)
                                <tr>
                                    <td>{{$reply->id}}</td>
                                    <td>{{$reply->author}}</td>
                                    <td>{{$reply->email}}</td>
                                    <td>{{$reply->body}}</td>
                                    <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
                                    <td>{{$reply->created_at->diffForHumans()}}</td>
                                    <td>

                                        @if($reply->is_active == 1)

                                            {!! Form::open(['method'=>'PUT','action'=>['CommentsRepliesController@update',$reply->id]]) !!}

                                            <input type="hidden" name="is_active" value="0">

                                            <div class="form-group">
                                                {{Form::button('<i class="fa fa-thumbs-up"></i>',['type'=>'submit','class'=>'btn btn-primary'])}}
                                            </div>


                                            {!! Form::close() !!}



                                        @else

                                            {!! Form::open(['method'=>'PUT','action'=>['CommentsRepliesController@update',$reply->id]]) !!}

                                            <input type="hidden" name="is_active" value="1">

                                            <div class="form-group">
                                                {{Form::button('<i class="fa fa-thumbs-down"></i> ',['type'=>'submit','class'=>'btn btn-success'])}}
                                            </div>


                                            {!! Form::close() !!}

                                        @endif


                                    </td>


                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=>['CommentsRepliesController@destroy',$reply->id]]) !!}


                                        <div class="form-group">
                                            {{Form::button('<i class="fa fa-trash-o"></i> ',['type'=>'submit','class'=>'btn btn-danger'])}}
                                        </div>


                                        {!! Form::close() !!}




                                    </td>


                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            @else
                <h1 class="text-center">No Replies</h1>
            @endif
        </div>
    </div>


@stop