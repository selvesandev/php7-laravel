@extends('Backend.master')


@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update Profile</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('Backend.includes.message')
                    <form method="post" action="{{route('update-profile')}}"
                          class="form-horizontal form-label-left input_mask">
                        {{csrf_field()}}

                        <div class="col-md-4 col-sm-4 form-group has-feedback">
                            <input value="{{$admin->name}}" type="text" name="name"
                                   class="form-control has-feedback-left"
                                   id="inputSuccess2"
                                   placeholder="Admin Name">
                            <span class="fa fa-newspaper-o form-control-feedback left" aria-hidden="true"></span>
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{$errors->first('name')}}
                                </div>
                            @endif

                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                            <input value="{{$admin->email}}" type="text" class="form-control" name="email"
                                   placeholder="Email Address">
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>


                        <div class="col-md-4 col-sm-4 form-group has-feedback">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>

                    <hr>

                    <form method="post" enctype="multipart/form-data" action="{{route('update-admin-password')}}">
                        <div class="col-md-3 form-group has-feedback">
                            <input type="password" class="form-control" name="old_password"
                                   placeholder="old password">
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>

                            @if($errors->has('old_password'))
                                <div class="text-danger">
                                    {{$errors->first('old_password')}}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-3 form-group has-feedback">
                            <input type="password" class="form-control" name="password"
                                   placeholder="password">
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>

                            @if($errors->has('password'))
                                <div class="text-danger">
                                    {{$errors->first('password')}}
                                </div>
                            @endif
                        </div>
                        {{csrf_field()}}


                        <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="confirm password">
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>

                            @if($errors->has('password_confirmation'))
                                <div class="text-danger">
                                    {{$errors->first('password_confirmation')}}
                                </div>
                            @endif
                        </div>


                        <div class="col-md-3 form-group has-feedback">
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('title')
    Add Admins
@endsection


@section('my-css')
    <link type="text/css" rel="stylesheet" href="{{URL::to('lib/select2/select2.min.css')}}"/>
@endsection

@section('my-script')
    <script type="text/javascript" src="{{URL::to('lib/select2/select2.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#categories').select2();
        })
    </script>
@endsection
