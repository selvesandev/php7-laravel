@extends('Backend.master')


@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Admins</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('Backend.includes.message')


                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">Name</th>
                            <th>Privilege</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($admins as $key=> $admin)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$admin->name}}
                                    <br>
                                    @foreach($admin->news as  $key => $news)
                                        {{str_limit($news->title,5)}}
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if($admin->privileges=='admin')
                                        <i class="fa fa-user fa-2x"></i>
                                    @else
                                        <i class="fa fa-user-secret text-danger fa-2x"></i>
                                    @endif
                                </td>
                                <td>{{$admin->email}}</td>

                                <td>
                                    {{$admin->created_at->diffForHumans()}}
                                </td>
                                <td>
                                    <a href="{{route('delete-admin',['id'=>$admin->id])}}"
                                       class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">No News Found. You can add one <u><a
                                                href="{{route('admin-admins-add')}}">here</a></u></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{$admins->links()}}

                </div>
            </div>
        </div>
    </div>

@endsection


@section('title')
    Add Categories
@endsection
