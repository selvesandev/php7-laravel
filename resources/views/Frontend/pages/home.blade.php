@extends('Frontend.master')


@section('content')
    <style>
        h1 {
            margin: 40px 0 0 0;
        }
    </style>

    <div class="">

        @php($categories=CategoryHelper::getCategory())
        <div class="links">
            @foreach($categories as $category)
                <a href="{{route('category-news',['id'=>$category->id])}}">{{$category->name}}</a>
            @endforeach
        </div>

        @foreach($news as $new)
            <h1><a href="{{route('news-single',['slug'=>$new->slug])}}">{{$new->title}}</a></h1>
            @foreach($new->categories as $category)
                <small>{{$category->name}}</small> &nbsp;&nbsp;
            @endforeach
            <br>
            <p>{{str_limit($new->summary,100)}}</p>
            <hr>
        @endforeach
    </div>


    @guest
        I am Guest
        @else
            I am Logged in as {{Auth::user()->name}}
            @endguest

@endsection

