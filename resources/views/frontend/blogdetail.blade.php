@extends('frontend.master')
@section('content')


<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->


    <div class="c-layout-breadcrumbs-1 c-bgimage" style="background-image: url({{asset('frontend/img/content/backgrounds/bg-10.jpg')}})">
        <div class="container">
            <div class="c-content-title-1 text-center">
                <h3>Blog Details</h3>
            </div>
        </div>
    </div>
    <!-- END: LAYOUT TITLE / BREADCRUMBS -->
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: BLOG LISTING -->


    <div class="c-content-box c-size-md ge-blog-wrp sidebar-page-container right-side-bar">
        <div class="container">
            <div class="row">
                <!--Content Side-->


                <div class="content-side col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <!--News Section-->


                    <section class="news-section blog-detail">
                        <!--News Block-->


                        <div class="news-block">
                            <div class="inner-box">
                                <!--Image Box-->


                                <figure class="image-box">
                                    <img alt="" src="{{asset('frontend/img/content/misc/latest-work-7.jpg')}}">
                                </figure>
                                <!--Lower Content-->


                                <div class="lower-content">
                                    <div class="upper-box">
                                        <h3>THE TOOL THAT COULD HELP YOU BUILD THE WORKOUT PLAYLIST
                                        </h3>


                                        <div class="date">
                                            October 21, 2019
                                        </div>
                                        <!--Dark Text-->


                                        <div class="dark-text">
                                            Sed egestas ante et vulputate volutpat eros pede semper est vitae luctus metus libero eu augue. Morbi purus libero faucibus adipiscing commodo quis gravida id est. Sed lectus. Praesent elementum hendreri Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus Read More READ MORE...
                                        </div>


                                        <div class="text">
                                            Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. 
                                        </div>
                                        <!--Post Share Options-->


                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Comments Area-->




                    </section>
                </div>
                <!--Content Side-->


                <div class="col-md-3">
                    <!-- BEGIN: CONTENT/BLOG/BLOG-SIDEBAR-1 -->
                    <div class="c-content-ver-nav sidBarNav">
                        <div class="nav-justified">
                            <h3>Recent Post</h3>


                            <div class="tab-content">
                                <div class="tab-pane active" id="blog_recent_posts">
                                    <ul class="c-content-recent-posts-1">
                                        <li>
                                            <div class="c-image"><img alt="" class="img-responsive" src="{{asset('frontend/img/content/stock/09.jpg')}}">
                                            </div>


                                            <div class="c-post">
                                                <a class="c-title" href="#">Relaxing yoga classes for your and mind</a>

                                                <div class="c-date">
                                                    May 16, 2016 by 
                                                </div>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="c-image"><img alt="" class="img-responsive" src="{{asset('frontend/img/content/stock/9.jpg')}}">
                                            </div>


                                            <div class="c-post">
                                                <a class="c-title" href="#">Relaxing yoga classes for your and mind</a>

                                                <div class="c-date">
                                                    May 16, 2016 by 
                                                </div>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="c-image"><img alt="" class="img-responsive" src="{{asset('frontend/img/content/stock/07.jpg')}}">
                                            </div>


                                            <div class="c-post">
                                                <a class="c-title" href="#">Relaxing yoga classes for your and mind</a>

                                                <div class="c-date">
                                                    May 16, 2016 by 
                                                </div>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="c-image"><img alt="" class="img-responsive" src="{{asset('frontend/img/content/stock/intro-3.png')}}">
                                            </div>


                                            <div class="c-post">
                                                <a class="c-title" href="#">Relaxing yoga classes for your and mind</a>

                                                <div class="c-date">
                                                    May 16, 2016 by 
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                   


                    <div class="c-content-ver-nav sidBarNav blog-tags-wrp">
                        <h3>Tags</h3>
                        <span class="label label-default">Install</span> <span class="label label-default">Design</span> <span class="label label-default">Video</span> <span class="label label-default">Branding</span> <span class="label label-default">Pakaging</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: CONTENT/TESTIMONIALS/TESTIMONIALS-6-5 -->
    <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->


@endsection