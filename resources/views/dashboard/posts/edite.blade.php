@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.posts')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.posts.index') }}"> @lang('site.posts')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.title')</label>
                                <input type="text" name="{{ $locale }}[title]" class="form-control" value="{{ $post->title }}">
                            </div>

                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.body')</label>
                                <textarea name="{{ $locale }}[body]" class="form-control ckeditor">{{ $post->body }}</textarea>
                            </div>

                        @endforeach

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $post->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.status')</label>
                            <select name="status" class="form-control">
                                <option value="">@lang('site.status')</option>
                                @php
                                    $status=['published','draft'];
                                @endphp

                                @foreach ($status as $stat)
                                    <option class="custom-select" value="{{ $stat }}" {{ $post->status == $stat ? 'selected' : '' }}>{{ $stat}}</option>
                                @endforeach
                            </select>
                            {{--                            <input type="boolean" name="status" step="0.01" class="form-control" value="{{ old('status') }}">--}}
                        </div>

                        {{--<div class="form-group">
                            <label>@lang('site.status')</label>
                            <input type="text" name="status" step="0.01" class="form-control" value="{{ $post->status }}">
                        </div>--}}


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
