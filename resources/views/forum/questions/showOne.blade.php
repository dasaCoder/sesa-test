@extends('layouts.master')

@section('content')


    <div class="main">
        <div class="container">

            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">

                    <div class="content-page">
                        <div class="row">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="col-md-9 col-sm-9 blog-item">
                                <div class="blog-item-img">
                                    <!-- BEGIN CAROUSEL -->
                                    <div class="">
                                        <div id="myCarousel" class="">
                                            <!-- Carousel items -->
                                            <div class="">


                                            </div>
                                            <!-- Carousel nav -->

                                        </div>
                                    </div>
                                    <!-- END CAROUSEL -->
                                </div>
                                <h2>{{$question->title}}</h2>
                                <div class="blog-body">{!! $question->body !!}</div>
                                <ul class="blog-info">
                                    <li><i class="fa fa-user"></i> {{ $question->user->name}}</li>
                                    <li><i class="fa fa-calendar"></i> {{$question->created_at}}</li>
                                    {{-- <li><i class="fa fa-comments"></i> 17</li>
                                     <li><i class="fa fa-tags"></i> Metronic, Keenthemes, UI Design</li>--}}
                                </ul>

                                <h3>Answers</h3>
                                <div class="comments" id="answers">

                                    @foreach($question->comments as $comment)

                                        <div class="media">
                                            <a href="javascript:;" class="pull-left">
                                                <img src="assets/pages/img/people/img1-small.jpg" alt="" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <div class="row">

                                                    <div class="row">
                                                        <h4 class="media-heading"> <span id="cmnt-span" data-comment-id="{{$comment->id}}">by {{$comment->user->name}}

                                                                @auth
                                                                @if(auth()->user()->id==$comment->user->id)
                                                                / <a class="edit-comment" href="javascript:;">Edit</a> / <a class="delete-comment" href="javascript:;">Delete</a>
                                                                    @endif
                                                                @endauth

                                                            </span></h4>

                                                    </div>

                                                    <p class="comment-body" data-comment="{{$comment->body}}">{{$comment->body}} </p>
                                                </div>

                                                <hr>
                                                <!-- Nested media object -->
                                                <div class="row">
                                                    @if(count($comment->replies)==1)
                                                        <p class="reply_count">{{count($comment->replies)}} reply</p>
                                                    @elseif(count($comment->replies)>1)
                                                        <p class="reply_count">{{count($comment->replies)}} replies</p>


                                                    @elseif(count($comment->replies)==0)
                                                        <p class="reply_count">add a reply</p>


                                                    @endif
                                                </div>
                                                <div id="replies">
                                                    <div class="rep_content">
                                                        @foreach($comment->replies as $reply)
                                                            <div class="media">
                                                                <a href="javascript:;" class="pull-left">
                                                                    <img src="assets/pages/img/people/img2-small.jpg" alt="" class="media-object">
                                                                </a>
                                                                <div class="media-body">
                                                                    <div class="row">
                                                                        <h4 class="media-heading"> <span>by {{$reply->user->name}} </span></h4>

                                                                    </div>
                                                                    <div class="row">
                                                                        <p>{{$reply->body}} </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!--end media-->
                                                        <div class="post-reply padding-top-40">

                                                            <form class="submit-reply" role="form" action="{{url('reply/add')}}" method="post">


                                                                <div class="form-group">
                                                                    <label>Reply</label>
                                                                    <textarea class="form-control" rows="3" name="body"></textarea>
                                                                </div>
                                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                                                <p><button class="btn btn-primary" type="submit">Post a Reply</button></p>
                                                            </form>
                                                        </div>
                                                        <!--end media-->
                                                </div>





                                            </div>
                                        </div>



                                        <!--end media-->
                                @endforeach
                                <!--end media-->
                                </div>

                                <div class="post-comment padding-top-40">

                                    <form role="form" action="{{url('forum/answer/add')}}" method="post">
                                        {{csrf_field()}}


                                        <div class="form-group">
                                            <label>Answer</label>
                                            <textarea class="form-control need-tiny" rows="5" name="body"></textarea>
                                        </div>
                                        <input type="hidden" name="question_id" value="{{$question->id}}">

                                        <p><button class="btn btn-primary" type="submit">Post a Comment</button></p>
                                    </form>
                                </div>
                            </div>
                            <!-- END LEFT SIDEBAR -->

                            <!-- BEGIN RIGHT SIDEBAR -->
                            <div class="col-md-3 col-sm-3 blog-sidebar">
                                <!-- CATEGORIES START -->
                                <h2 class="no-top-space">Categories</h2>
                                <ul class="nav sidebar-categories margin-bottom-40">
                                    <li><a href="javascript:;">Java</a></li>
                                    <li><a href="javascript:;">C++</a></li>
                                    <li class="active"><a href="javascript:;">IOT</a></li>

                                </ul>
                                <!-- CATEGORIES END -->


                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT -->
                </div>
                <!-- END SIDEBAR & CONTENT -->
            </div></div></div>
    </div>
@stop