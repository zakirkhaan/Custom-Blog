@extends('layouts.admin')



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        <span style="font-size: 20px;"><i class="fa fa-photo"></i> Media</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('deleted'))

        <p class="alert-danger">
            {{session('deleted')}}
        </p>


    @endif




    <form action="delete/media" method="post" class="form-inline">

        {{@csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group">
            <select name="checkBoxArray" class="form-control" id="">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="delete_all" class="btn btn-primary">
        </div>

    <div class="row">
        <div class="col-lg-12">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="options"></th>
                                <th style="color: green;">Id</th>
                                <th style="color: blue;">File</th>
                                <th style="color: purple;">Created At</th>
                                <th style="color: darkblue;">Updated At</th>

                            </tr>
                            </thead>

                            <tbody>

                            @if($photos)

                                @foreach($photos as $photo)

                                    <tr>
                                        <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                                        <td>{{$photo->id}}</td>
                                        <td><img height="60" src="{{$photo->file}}" alt=""></td>
                                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'OOPS'}}</td>
                                        <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'OOPS'}}</td>


                                    </tr>

                                @endforeach
                            @endif
                            </tbody>




                        </table>
                    </div>
                </div>
            </div>
    </div>
    </form>


@stop


@section('scripts')


    <script>
    $(document).ready(function(){

        $('#options').click(function(){

            if(this.checked){
                $('.checkBoxes').each(function(){
                   this.checked = true;
                });
            }else {
                $('.checkBoxes').each(function(){
                    this.checked = false;
                });
            }

        });


    });
    </script>

    @stop