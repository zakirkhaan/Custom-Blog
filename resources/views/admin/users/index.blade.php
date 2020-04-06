@extends('layouts.admin')



@section('content')

    <h1>Users</h1>

    @if(Session::has('user_created'))
        <p class="alert-success">{{session('user_created')}}</p>

        @endif

    @if(Session::has('user_update'))

        <p class="alert-success">
            {{session('user_update')}}
        </p>

        @endif

    @if(Session::has('deleted_user'))

        <p class="alert-success">
            {{session('deleted_user')}}
        </p>

    @endif


    <!DOCTYPE html>

     <div class="container-fluid">
         <table class="table table-responsive table-bordered table-hover">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
          </tr>
        </thead>

          <tbody>
          @if($users)
              @foreach($users as $user)
                  <tr>
                      <td>{{$user->id}}</td>
                      <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
                      <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role->name}}</td>
                      <td>{{$user->is_active ==1 ? 'Active' : 'Not Active'}}</td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td>{{$user->updated_at->diffForHumans()}}</td>
                      <td>

                          {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}
                          {{@csrf_field()}}

                          <div class="form-group ">
                              {!! Form::submit('Delete ',['class'=>'btn btn-danger  ']) !!}
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
            {{$users->render()}}
        </div>
    </div>


@endsection