@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css" class="css">


@stop

@section('content')

   <div class="row">
       <div class="col-lg-12">
           <div class="panel panel-info">
               <div class="panel-heading">
                   <h3 class="panel-title text-center">
                       <span style="font-size: 20px;">
                           <i class="fa fa-upload"></i> Upload Photos
                       </span>
                   </h3>
               </div>
           </div>

           <div class="panel-body">
                <div class="form-horizontal">
                    {!! Form::open(['method'=>'post','action'=>'AdminMediasController@store','class'=>'dropzone']) !!}

                    {!! Form::close() !!}
                </div>
           </div>

       </div>
   </div>


@stop


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

@stop