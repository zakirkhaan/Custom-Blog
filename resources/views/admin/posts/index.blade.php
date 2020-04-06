@extends('layouts.admin')



@section('content')

    <h1 class="text-center">All Posts</h1>

    @if(Session::has('post_created'))

        <p class="alert-success">
            {{session('post_created')}}
        </p>

        @endif

    @if(Session::has('updated_post'))

        <p class="alert-success">
            {{session('updated_post')}}
        </p>

        @endif

    @if(Session::has('deleted_post'))

        <p class="alert-danger">
            {{session('deleted_post')}}
        </p>

        @endif



    <div class="container-fluid">
      <table class="table table-responsive table-bordered">
          <thead>
          <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Title</th>
              <th>Owner</th>
              <th>Comments</th>
              <th>Category</th>
              <th>Created</th>
              <th>Updated</th>
              <th style="color: red;">Delete</th>
          </tr>
          </thead>
          <tbody>
          @if($posts)
              @foreach($posts as $post)

          <tr>
              <td>{{$post->id}}</td>
              <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
              <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
              <td>{{$post->user->name}}</td>
              <td><a href="{{route('admin.comments.show',$post->id)}}">View</a></td>
              <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
              <td>
                  {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}

                    <div class="form-group">
                        {!! Form::button('<i class="fa fa-trash"> Delete </i>', ['type' => 'submit' ,'class' => 'btn btn-danger']) !!}
                    </div>


                  {!! Form::close() !!}

              </td>
          </tr>
              @endforeach
          @endif
          </tbody>
      </table>
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>

    </div>

@stop