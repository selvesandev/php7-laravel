@extends('Frontend.master')


@section('content')

    @php($categories=CategoryHelper::getCategory())
    <div class="">
        <div class="links">
            @foreach($categories as $category)
                <a href="{{route('category-news',['id'=>$category->id])}}">{{$category->name}}</a>
            @endforeach
        </div>

        @forelse($selected_cat->news as $new)
            <h1><a href="">{{$new->title}}</a></h1>
            <p>{{str_limit($new->summary,100)}}</p>
            <hr>
        @empty
            <h1>No News Found</h1>
        @endforelse
    </div>
@endsection

