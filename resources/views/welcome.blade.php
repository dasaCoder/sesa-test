<!DOCTYPE html>
<html lang="en">
@include('partials.head')
@yield('head')

<body>

<style type="text/css">

    .carousel-slider .carousel-item-eight{
        background: url({{asset('img/web-banner/cover.jpg')}});
    }
    .carousel-slider .carousel-item-nine{
        background: url({{asset('img/web-banner/sesa-cover.jpg')}});
    }
    .flex-caption {
        width: 100%;
        padding: 2%;
        left: 0;
        bottom: 0;
        background: rgba(0,0,0,.5);
        color: #fff;
        text-shadow: 0 -1px 0 rgba(0,0,0,.3);
        font-size: 14px;
        line-height: 18px;
    }
    @media (min-width: 1500px) {
        .container {
            width: 1470px;
        }
    }
</style>
<script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
<script>
    $(document).ready(function () {

       // $('.slider').slider();

       $.get('{{url("event/allToSlide")}}',function (data) {
          // Layout.init();
           console.log(data);
          var stuff="";

          for(var x=0;x<data.length;x++){
              stuff+='<a href="http://localhost:8383/sesa/public/event/show/'+data[x]['id']+'"><div class="item"> <img src="http://localhost:8383/sesa/public'+data[x]['filepath'] +' "  style="height:350px;" />'+
              '<div class="carousel-caption"><p>'+ data[x]['title']+'</p>'+
              '</div></div></a>';
          }
        $('#event-show').append(stuff);
           $('#event-show').owlCarousel({
               items:1,
               loop:true,
               margin:10,
               autoplay:true,
               autoplayTimeout:1000,
               autoplayHoverPause:true,
               smartSpeed: 5000,
           });

       });

       $.get('{{url('project/getThree')}}',function (data){
console.log(data);
           var content="";


           for(var y=0;y<data.length;y++){
               content+='<div class="recent-work-item"><em> <img style="height: 150px" src="http://localhost:8383/sesa/public'+data[y]['filepath']+
                       '"  class="img-responsive"><a href="http://localhost:8383/sesa/public/'+data[y]['id']+
                       '" ><i class="fa fa-link"></i></a> <a href="http://localhost:8383/sesa/public'+data[y]['filepath']+
                       '" class="fancybox-button" title="'+data[y]['title']+'" data-rel="fancybox-button"><i class="fa fa-search"></i></a> </em><a class="recent-work-description" href="javascript:;">'+
                       ' <strong>'+data[y]['title']+'</strong><b></b></a></div>';

           }

           $('#project_show').append(content).owlCarousel({
               items:3,
               loop:true,
               margin:10,
               autoplay:true,
               autoplayTimeout:1000,
               autoplayHoverPause:true,
               smartSpeed: 2000,
           });

          // $('#project_show');




       });

      /*  $('.main-banner').bxSlider({
            mode: 'fade',
            controls: false,
            auto: true,
            moveSlides: 1,
            captions: true
        });*/
    });
</script>


<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->

<script src="{{asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->
<script src="{{asset('assets/plugins/owl.carousel/owl.carousel.min.js')}}" type="text/javascript"></script><!-- slider for products -->

<script src="{{asset('assets/corporate/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/pages/scripts/bs-carousel.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
       // Layout.initOWL();
        //Layout.initTwitter();
        //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
        //Layout.initNavScrolling();
    });
</script>


<style>

</style>

<div class="row">
    @include('partials.nav')
    @yield('navbar')
</div>
<div class="page-slider margin-bottom-40">
    <div id="carousel-example-generic" class="carousel slide carousel-slider">
        <!-- Indicators -->
        <ol class="carousel-indicators carousel-indicators-frontend">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
            <div class="item carousel-item-eight active">
                <div class="container">
                    <div class="carousel-position-six text-uppercase text-center">
                       {{-- <h2 class="margin-bottom-20 animate-delay carousel-title-v5" data-animation="animated fadeInDown">
                            Expore the power <br/>
                            <span class="carousel-title-normal">of Metronic</span>
                        </h2>
                        <p class="carousel-subtitle-v5 border-top-bottom margin-bottom-30" data-animation="animated fadeInDown">This is what you were looking for</p>
                        <a class="carousel-btn-green" href="#" data-animation="animated fadeInUp">Purchase Now!</a>--}}
                    </div>
                </div>
            </div>

            <!-- Second slide -->
            <div class="item carousel-item-nine">
                <div class="container">
                    <div class="carousel-position-six">
                       {{-- <h2 class="animate-delay carousel-title-v6 text-uppercase" data-animation="animated fadeInDown">
                            Need a website design?
                        </h2>
                        <p class="carousel-subtitle-v6 text-uppercase" data-animation="animated fadeInDown">
                            This is what you were looking for
                        </p>
                        <p class="carousel-subtitle-v7 margin-bottom-30" data-animation="animated fadeInDown">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>
                            Sed est nunc, sagittis at consectetur id.
                        </p>
                        <a class="carousel-btn-green" href="#" data-animation="animated fadeInUp">Purchase Now!</a>
                    --}}</div>
                </div>
            </div>

            <!-- Third slide -->
            {{--<div class="item carousel-item-ten">
                <div class="container">
                    <div class="carousel-position-six">
                        <h2 class="animate-delay carousel-title-v6 text-uppercase" data-animation="animated fadeInDown">
                            Powerful &amp; Clean
                        </h2>
                        <p class="carousel-subtitle-v6 text-uppercase" data-animation="animated fadeInDown">
                            Responsive Website &amp; Admin Theme
                        </p>
                        <p class="carousel-subtitle-v7 margin-bottom-30" data-animation="animated fadeInDown">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>
                            Sed est nunc, sagittis at consectetur id.
                        </p>
                    </div>
                </div>
            </div>--}}
        </div>

        <!-- Controls -->
        <a class="left carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <a class="right carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </a>
    </div>
</div><!-- END SLIDER -->
<div class="main" style="background-color: #f7f5f5;">


<div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">

                <div class="content-page">
                    <div class="row margin-bottom-30">


                        <!-- BEGIN PORTFOLIO DESCRIPTION -->
                        <div class="col-md-8">
                            <h2>Our Mission</h2>
                            <p>Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa quis tempor incididunt ut et dolore et dolorum fuga. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus.</p>
                            <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde nostrudlaboris. Sed unde omnis iste natus error sit voluptatem.</p>
                            <br>
                            <div class="row front-lists-v2 margin-bottom-15">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-html5"></i> Game Designing</li>
                                        <li><i class="fa fa-bell"></i> Net Centric Applications</li>
                                        <li><i class="fa fa-globe"></i> Data Science & Engineering</li>

                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-dropbox"></i> Mobile Applications</li>
                                        <li><i class="fa fa-cloud"></i> Health Informatics</li>
                                        <li><i class="fa fa-comments"></i> Business Intelligence</li>

                                    </ul>
                                </div>
                            </div>
                            <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{url('course_content')}}"> View full course Content</a>
                        </div>
                        <!-- END PORTFOLIO DESCRIPTION -->
                        <!-- BEGIN CAROUSEL -->
                        <div class="col-md-4 front-carousel">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div id="event-show" class=" carousel-inner">

                                </div>
                                <!-- Carousel nav -->
                                <a data-slide="prev" href="#myCarousel" class="carousel-control left">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a data-slide="next" href="#myCarousel" class="carousel-control right">
                                    <i class="fa fa-angle-right"></i>
                                </a>


                            </div>
                        </div>
                        <!-- END CAROUSEL -->
                    </div>
                    <hr>

                    <div class="row quote-v1 margin-bottom-30">
                        <div class="col-md-9">
                            <span></span>
                        </div>
                        {{--<div class="col-md-3 text-right">
                            <a class="btn-transparent" href="http://www.keenthemes.com/preview/index.php?theme=metronic_admin" target="_blank"><i class="fa fa-rocket margin-right-10"></i>Preview Admin</a>
                        </div>--}}
                    </div>

        <!-- BEGIN RECENT WORKS -->
        <div class="row recent-work margin-bottom-40">

            <div class="col-md-7">
                <div id="project_show" class="owl-carousel owl-carousel3">

                </div>
            </div>
            <div class="col-md-5">
                <h2><a href="portfolio.html">Recent Works</a></h2>
                <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde voluptatem. Sed unde omnis iste natus error sit voluptatem.</p>
                <a style="margin-bottom: 10px;" class="btn btn-primary" href="{{url('course_content')}}"> View all Events</a>
            </div>
        </div>


        <div class="row mix-block margin-bottom-40">
            <div class="col-md-12">
            <div class="row margin-bottom-20">
            <div class="col-md-3">
                <div class="service-box-v1" style="background-color: #e1f5fe;">
                    <div><i class="fa fa-comments color-grey"></i></div>
                    <h2>Forum</h2>
                    <p>This platform will help our graduates to act on one stage and share thier knowledge</p>
                </div>
            </div>
                <div class="col-md-3">
                    <div class="service-box-v1" style="background-color: #b3e5fc;">
                        <div><i class="fa fa-calendar-o color-grey"></i></div>
                        <h2>Events</h2>
                        <p>Keep in touch with our events</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-box-v1" style="background-color: #81d4fa;">
                        <div><i class="fa fa-code-fork color-grey"></i></div>
                        <h2>Projects</h2>
                        <p>This will showcase our students' progrss</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-box-v1" style="background-color: #4fc3f7;">
                        <div><i class="fa fa-rss color-grey"></i></div>
                        <h2>Articles</h2>
                        <p>Train to express your ideas in writing form</p>
                    </div>
                </div>

        </div>
        </div>
        </div>

</div>

            </div>
        </div>
</div>
</div>

        {{--


        <!-- END RECENT WORKS -->



   {{-- <div class="row">
        <div  style="padding-right: 0px">
            <div class="" >

<h2 class="heading-title">Upcomming events...</h2>
                <div >
                    <ul id="ul-event" class="bxslider">

                    </ul>
                </div>

            </div>

        </div>


    </div>
<div class="row" style="background-color: black"><div class="coupons">
        <div class="coupons-grids text-center">
            <div class="w3layouts_mail_grid">
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <img src="{{asset('img/course01.jpg')}}" class="img-officers-msg" alt="">
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE SHIPPING</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>MONEY BACK GUARANTEE</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <img src="{{asset('img/razor.jpg')}}"  class="img-officers-msg" alt="">
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>24/7 SUPPORT</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>

                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE GIFT COUPONS</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div></div></div>

<div class="polaroids">

    <div class="polaroid">
        <img src="http://lorempixel.com/200/200/nature/1">
        <p>Image 1<br>more Text ...</p>
    </div>
    <div class="polaroid">
        <img src="http://lorempixel.com/200/200/nature/2">
        <p>Image 2<br>more Text ...</p>
    </div>
    <div class="polaroid">
        <img src="http://lorempixel.com/200/200/nature/3">
        <p>Image 3<br>more Text ...</p>
    </div>
    <div class="polaroid">
        <img src="http://lorempixel.com/200/200/nature/4">
        <p>Image 4<br>more Text ...</p>
    </div>
    <div class="polaroid">
        <img src="http://lorempixel.com/200/200/nature/4">
        <p>Image 4<br>more Text ...</p>
    </div>
    <div class="polaroid">
        <img src="http://lorempixel.com/200/200/nature/4">
        <p>Image 4<br>more Text ...</p>
    </div>

</div>--}}



@include('partials.footer')
@yield('footer')



</body>
</html>