@extends('Frontend.master')


@section('content')

    @php($categories=CategoryHelper::getCategory())
    <div class="">
        <div class="links">
            @foreach($categories as $category)
                <a href="{{route('category-news',['id'=>$category->id])}}">{{$category->name}}</a>
            @endforeach
        </div>

        <h1>{{$news->title}}</h1>
        <hr>
        <p>{!!  htmlspecialchars_decode($news->details)!!}</p>

    </div>
@endsection

