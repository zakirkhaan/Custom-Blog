@extends('layouts.blog-post')



@section('content')



    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}} </p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->

    <p>{{$post->body}}</p>

    <hr>

    <!-- Blog Comments -->




    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://blog-wpvxnjdnnc.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script id="dsq-count-scr" src="//blog-wpvxnjdnnc.disqus.com/count.js" async></script>













    {{--@if(Session::has('msg'))--}}

{{--    <p class="alert-success">{{session('msg')}}</p>--}}

{{--    @endif--}}




















{{--    @if(Auth::check())--}}
{{--        <!-- Comments Form -->--}}
{{--        <div class="well">--}}
{{--            <h4>Post Your Comment Here:</h4>--}}


{{--            {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}--}}

{{--            <input type="hidden" name="post_id" value="{{$post->id}}">--}}

{{--            <div class="form-group">--}}
{{--                {!! Form::label('body','Type a Comment') !!}--}}
{{--                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                {!! Form::button('<i class="fa fa-comments"></i> Comment',['type'=>'submit','class'=>'btn btn-primary']) !!}--}}
{{--            </div>--}}

{{--            {!! Form::close() !!}--}}

{{--        </div>--}}
{{--@endif--}}
{{--    <hr>--}}

{{--    <!-- Posted Comments -->--}}

{{--    @if(count($comments) > 0)--}}


{{--        @foreach($comments as $comment)--}}
{{--            <!-- Comment -->--}}
{{--            <div class="media">--}}
{{--                <a class="pull-left" href="#">--}}
{{--                    <img height="64" class="media-object" src="{{Auth::user()->gravatar}}" alt="">--}}
{{--                </a>--}}
{{--                <div class="media-body">--}}
{{--                    <h4 class="media-heading">{{$comment->author}}--}}
{{--                        <small>{{$comment->created_at->diffForHumans()}}</small>--}}
{{--                    </h4>--}}
{{--                    <p>{{$comment->body}}</p>--}}

{{--                  @if(count($comment->replies) > 0)--}}

{{--                      @foreach($comment->replies as $reply)--}}


{{--                          @if($reply->is_active == 1)--}}

{{--                          <!-- Nested Comment -->--}}



{{--                              <div class=" media" style="margin-top: 30px;" >--}}
{{--                                  <a class="pull-left" href="#">--}}
{{--                                      <img height="64" class="media-object" src="{{$reply->photo}}" alt="">--}}
{{--                                  </a>--}}

{{--                                  <div class="media-body">{{$reply->author}}--}}
{{--                                      <h4 class="media-heading">--}}
{{--                                          <small>{{$reply->created_at->diffForHumans()}}</small>--}}
{{--                                      </h4>--}}
{{--                                      <p>{{$reply->body}}</p>--}}
{{--                                  </div>--}}


{{--                                  @if(Session::has('reply_msg'))--}}
{{--                                      <p class="alert-success">{{session('reply_msg')}}</p>--}}
{{--                                  @endif--}}
{{--                                  <div class="comment-reply-container">--}}
{{--                                      <button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}

{{--                                      <div class="comment-reply col-sm-10">--}}



{{--                                      {!! Form::open(['method'=>'POST','action'=>'CommentsRepliesController@createReply']) !!}--}}

{{--                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">--}}

{{--                                    <div class="form-group">--}}
{{--                                     {!! Form::label('body','Feedback:') !!}--}}
{{--                                     {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                      {!! Form::button('<i class="fa fa-reply"></i> Reply' ,['type'=>'submit','class'=>'btn btn-success'] ) !!}--}}
{{--                                    </div>--}}
{{--                                {!! Form::close() !!}--}}

{{--                              </div>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                                @endif--}}
{{--                          @endforeach--}}
{{--                      @endif--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        @endforeach--}}

{{--    @endif--}}

{{--@stop--}}







@section('sidebar')

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        <!-- /.input-group -->
    </div>






    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Categories</h4>
        <div class="row">


            <div class="col-lg-6">

                <ul class="list-unstyled">
                    @if($categories)

                        @foreach($categories as $category)

                            <li>{{$category->name}}</li>
                </ul>
            </div>

            <div class="col-lg-6">
                <ul class="list-unstyled">


                    @endforeach

                    @endif
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>


    <!-- Side Widget Well -->

@stop





{{--@section('scripts')--}}

{{--    <script>--}}
{{--        $(".comment-reply-container .toggle-reply").click(function(){--}}
{{--            $(this).next().slideToggle("slow");--}}
{{--        });--}}
{{--    </script>--}}

    @stop
