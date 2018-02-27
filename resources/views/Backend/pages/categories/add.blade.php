@extends('Backend.master')


@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Categories</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    @include('Backend.includes.errors')
                    @include('Backend.includes.message')

                    <form id="demo-form2" method="post" data-parsley-validate="" action="{{route('admin-categories')}}"
                          class="form-horizontal form-label-left"
                          novalidate="">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" value="{{old('name')}}" id="first-name"
                                       required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="ln_solid"></div>


                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="50%">Category Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $key=> $category)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$category->name}}</td>
                                <td>
                                    <form action="{{route('update-cat-status')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$category->id}}">
                                        @if($category->status)
                                            <button name="_disable" type="submit" value="disable"
                                                    class="btn btn-danger btn-xs">
                                                <i
                                                        class="fa fa-times"></i></button>
                                        @else
                                            <button type="submit" name="_enable" value="enable"
                                                    class="btn btn-success btn-xs"><i
                                                        class="fa fa-check"></i>
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    <a href="" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Category Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{$categories->links()}}

                </div>
            </div>
        </div>
    </div>

@endsection


@section('title')
    Add Categories
@endsection
