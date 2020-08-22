@extends('layouts.app')
@section('content')

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Archive Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">
                           
                            <!-- Section Heading -->
                            <div class="col-12">
                                <div class="section-heading">
                                    <h2>Archive Posts</h2>
                                    <!-- <p>Post categories: Life Style</p> -->
                                </div>
                            </div>
                            @if($posts->count() > 0)
                                @foreach($posts as $index=>$post)
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
                        <!-- <div class="single-widget-area mb-50">
                            <form class="search-form" action="#" method="post">
                                <input type="search" name="search" class="form-control" placeholder="Search...">
                                <button><i class="fa fa-send"></i></button>
                            </form>
                        </div> -->

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Categories</h6>
                            </div>
                            <ol class="nikki-catagories">
                                @if($categories->count() > 0)
                                    @foreach($categories as $category)
                                        <li><a href="{{ '/'.$category->id }}"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $category->name }}</span> <span>({{ $category->posts->count() }})</span></a></li>
                                    @endforeach
                                @endif
                            </ol>
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
                        <!-- <div class="single-widget-area mb-30">
                           
                            <div class="widget-title">
                                <h6>Archives</h6>
                            </div>
                            <ol class="nikki-archives">
                                <li><a href="#">February 2018</a></li>
                                <li><a href="#">June 2018</a></li>
                                <li><a href="#">March 2018</a></li>
                                <li><a href="#">November 2018</a></li>
                            </ol>
                        </div> -->

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>popular tags</h6>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Unique</a></li>
                                <li><a href="#">Template</a></li>
                                <li><a href="#">Photography</a></li>
                                <li><a href="#">travel</a></li>
                                <li><a href="#">lifestyle</a></li>
                                <li><a href="#">Wordpress Template</a></li>
                                <li><a href="#">food</a></li>
                                <li><a href="#">Idea</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
@endsection