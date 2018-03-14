@extends('Backend.master')


@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>News</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('Backend.includes.message')

                    @if($hasHigh===false)
                        <div class="alert alert-warning">
                            You must have at least one news with <code>high</code> Priority.
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">Title</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>News Date</th>
                            <th>Status</th>
                            <th>Summary</th>
                            <th>Priority</th>
                            <th>Share / Views</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($news as $key=> $new)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$new->title}}
                                    @if($new->admin)
                                        ({{$new->admin->name}})
                                    @endif
                                </td>
                                <td>
                                    @foreach($new->categories as $newsCategory)
                                        <span class="label label-default">{{$newsCategory->name}}</span>
                                    @endforeach
                                </td>
                                <td><img height="30" src="{{URL::to('Uploads/News/'.$new->image)}}" alt=""></td>
                                <td>{{$new->news_date}}</td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <p title="{{$new->summary}}">{{str_limit($new->summary,50)}}</p>
                                </td>
                                <td>
                                    <form method="post" action="{{route('update-priority',['id'=>$new->id])}}">
                                        {{csrf_field()}}
                                        @if($new->priority==='high')
                                            <button type="submit" name="degrade" value="degrade"
                                                    class="btn btn-success btn-xs">Degrade
                                            </button>
                                        @else
                                            <button value="upgrade" type="submit" name="upgrade"
                                                    class="btn btn-default btn-xs">Upgrade
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td></td>
                                <td>
                                    <a href="{{route('admin-news-delete',['id'=>$new->id])}}"
                                       class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    <a href="" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">No News Found. You can add one <u><a
                                                href="{{route('admin-news-add')}}">here</a></u></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('title')
    Add Categories
@endsection
