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
                                                <div class="item">
                                                    <img src="{{url($blog->filepath)}}" alt="">
                                                </div>

                                            </div>
                                            <!-- Carousel nav -->

                                        </div>
                                    </div>
                                    <!-- END CAROUSEL -->
                                </div>
                                <h2>{{$blog->title}}</h2>
                               <div class="blog-body">{!! $blog->body !!}</div>
                                <ul class="blog-info">
                                    <li><i class="fa fa-user"></i> {{ $blog->users->name}}</li>
                                    <li><i class="fa fa-calendar"></i> {{$blog->created_at}}</li>
                                   {{-- <li><i class="fa fa-comments"></i> 17</li>
                                    <li><i class="fa fa-tags"></i> Metronic, Keenthemes, UI Design</li>--}}
                                </ul>

                                <h3>Comments</h3>
                                <div class="comments" id="comments">

                                    @foreach($blog->comments as $comment)

                                    <div class="media">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="assets/pages/img/people/img1-small.jpg" alt="" class="media-object">
                                        </a>
                                        <div class="media-body">
                                            <div class="row">
                                                <h4 class="media-heading"> <span>by {{$comment->user->name}} / <a href="javascript:;">Reply</a></span></h4>

                                                <p>{{$comment->body}} </p>
                                            </div>
                                            <hr>
                                            <!-- Nested media object -->
                                            @foreach($comment->replies as $reply)
                                                <div class="media">
                                                    <a href="javascript:;" class="pull-left">
                                                        <img src="assets/pages/img/people/img2-small.jpg" alt="" class="media-object">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"> <span>by {{$reply->user->name}} / <a href="javascript:;">Reply</a></span></h4>
                                                        <p>{{$reply->body}} </p>
                                                    </div>
                                                </div>
                                                @endforeach


                                            <!--end media-->
                                            <div class="post-comment padding-top-40">

                                                <form role="form" action="{{url('reply/add')}}" method="post">
                                                    {{csrf_field()}}
                                                    {{--<div class="form-group">
                                                        <label>Name</label>
                                                        <input class="form-control" type="text">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email <span class="color-red">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>--}}

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



                                    <!--end media-->
                                    @endforeach
                                    <!--end media-->
                                </div>

                                <div class="post-comment padding-top-40">

                                    <form role="form" action="{{url('comment/add')}}" method="post">
                                        {{csrf_field()}}
                                        {{--<div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label>Email <span class="color-red">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>--}}

                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" rows="5" name="body"></textarea>
                                        </div>
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}">

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

                                <h2>Related Articles</h2>
                                @foreach($blog->tags as $tag)
                                    @foreach($tag->blogs as $blog_rel)

                                        <div class="recent-news margin-bottom-10">
                                            <div class="row margin-bottom-10">
                                                <div class="col-md-3">

                                                </div>
                                                <div class="col-md-9 recent-news-inner">
                                                    <h3><a href="javascript:;">{{$blog_rel->title}}</a></h3>
                                                    <p>{{$blog_rel->created_at}}</p>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach


                                @endforeach

                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
            </div></div></div>
    </div>
    @stop