@extends('layouts.blog-home')

@section('content')


    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <span style="text-align: center; color: darkblue;">Latest Posts</span>
                    <small>Featured Posts</small>
                </h1>

                <!-- First Blog Post -->
                @if($posts)

                    @foreach($posts as $post)

                <h2>
                    <a href="/post/{{$post->id}}">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by {{$post->user->name}}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                <hr>
                        <a href="/post/{{$post->id}}"> <img class="img-responsive" src="{{$post->photo ?$post->photo->file : 'http://placehold.it/400x400'}}" alt=""></a>
                <hr>
                <p>{{str_limit($post->body,500)}}</p>
                <a class="btn btn-primary" href="/post/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                @endforeach

            @endif



                <!-- Pager -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$posts->render()}}
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar  -->
            @include('includes.front_sidebar')

        </div>
        <!-- /.row -->


@endsection







