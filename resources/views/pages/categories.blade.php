@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="box box-primary">

            @include('partials._errors')

            @foreach($categories as $index=>$category)

                @if($category->id >0)

                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           <a href="{{ '/'.$category->id }}">{{ $category->name }}</a>
                            <span class="badge badge-primary badge-pill">{{ $category->posts->count() }}</span>
                        </li>


                    </ul>

                @endif

            @endforeach


        </div><!-- end of box body -->

    </div><!-- end of box -->






@endsection
