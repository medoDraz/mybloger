@extends('layouts.app')
@section('content')

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <!-- Preloader -->
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="circle-preloader">
                <div class="a" style="--n: 5;">
                    <div class="dot" style="--i: 0;"></div>
                    <div class="dot" style="--i: 1;"></div>
                    <div class="dot" style="--i: 2;"></div>
                    <div class="dot" style="--i: 3;"></div>
                    <div class="dot" style="--i: 4;"></div>
                </div>
            </div>
        </div>

        <div class="hero-post-slides owl-carousel">

            @if($new_posts->count() > 0)
                @foreach($new_posts as $new_post)
                    <!-- Single Hero Post -->
                    <div class="single-hero-post d-flex flex-wrap">
                        <!-- Post Thumbnail -->
                        <div class="slide-post-thumbnail h-100 bg-img" style="background-image: url('{{ $new_post->image_path }}');"></div>
                        <!-- Post Content -->
                        <div class="slide-post-content h-100 d-flex align-items-center">
                            <div class="slide-post-text">
                                <p class="post-date" data-animation="fadeIn" data-delay="100ms">{{Carbon\Carbon::parse($new_post->created_at)->toFormattedDateString()}} / {{ $new_post->category->name }}</p>
                                <a href="{{ 'pages/article/'.$new_post->id }}" class="post-title" data-animation="fadeIn" data-delay="300ms">
                                    <h2>{{ $new_post->title }}</h2>
                                </a>
                                <p class="post-excerpt" data-animation="fadeIn" data-delay="500ms">{!! Str::words($new_post->body, 40, ' ....') !!}</p>
                                <a href="{{ 'pages/article/'.$new_post->id }}" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Read More</a>
                            </div>
                            <!-- Page Count -->
                            <div class="page-count"></div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-100">
        <div class="container">

            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">

                            <!-- Featured Post Area -->
                            <div class="col-12">
                                <!-- Title -->
                                <div class="widget-title" style="margin-bottom: 30px;">
                                    <h4>Recent Posts</h4>
                                </div>
                            </div>
                            @if($posts->count() > 0)
                                @foreach($posts as $post)
                                    <!-- Single Blog Post -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post mb-50">
                                            <!-- Thumbnail -->
                                            <div class="post-thumbnail">
                                                <a href="{{ 'pages/article/'.$post->id }}"><img src="{{$post->image_path}}" alt=""></a>
                                            </div>
                                            <!-- Content -->
                                            <div class="post-content">
                                                <p class="post-date">{{Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}} / {{ $post->category->name }}</p>
                                                <a href="{{ 'pages/article/'.$post->id }}" class="post-title">
                                                    <h4>{{ $post->title }}</h4>
                                                </a>
                                                <p class="post-excerpt">{!! Str::words($post->body, 30, ' ....') !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Pager -->
                    <ol class="nikki-pager">
                        <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
                        <li><a href="#">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                    </ol>
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>About Me</h6>
                            </div>
                            <!-- Thumbnail -->
                            <div class="about-thumbnail">
                                <img src="{{ asset('images/blog-img/about-me.jpg') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="widget-content text-center">
                                <img src="{{ asset('images/core-img/signature.png') }}" alt="">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ipsum adipisicing</p>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Subscribe &amp; Follow</h6>
                            </div>
                            <!-- Widget Social Info -->
                            <div class="widget-social-info text-center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Latest Posts</h6>
                            </div>
                            @if($new_posts->count() > 0)
                                @foreach($new_posts as $new_post)
                                    <!-- Single Latest Posts -->
                                    <div class="single-latest-post d-flex">
                                        <div class="post-thumb">
                                            <img src="{{$new_post->image_path}}" alt="">
                                        </div>
                                        <div class="post-content">
                                            <a href="{{ 'pages/article/'.$new_post->id }}" class="post-title">
                                                <h6>{{ $new_post->title }}</h6>
                                            </a>
                                            <a href="#" class="post-author"><span>by</span> Admin</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>popular tags</h6>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                @if($categories->count() > 0)
                                    @foreach($categories as $category)
                                        <li><a href="#">{{ $category->name }}</a></li>
                                    @endforeach
                                @endif
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
@endsection