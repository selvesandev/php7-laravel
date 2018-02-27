@extends('Backend.master')


@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add News</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" action="{{route('admin-news-add')}}"
                          class="form-horizontal form-label-left input_mask">
                        {{csrf_field()}}

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" name="title" class="form-control has-feedback-left" id="inputSuccess2"
                                   placeholder="News Title">
                            <span class="fa fa-newspaper-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" id="date-time-picker" placeholder="News Date">
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="file" class="form-control has-feedback-left" id="inputSuccess4"
                            >
                            <span class="fa fa-thumbs-up form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary"
                                       data-toggle-passive-class="btn-default">
                                    <input type="radio" name="status" value="1" data-parsley-multiple="gender">
                                    &nbsp; Enable &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary"
                                       data-toggle-passive-class="btn-default">
                                    <input checked type="radio" name="status" value="0" data-parsley-multiple="gender">
                                    Disable
                                </label>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <hr>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Meta Keywords</label>
                                <input type="text" class="form-control" placeholder="Default Input">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Summary</label>
                                <textarea name="summary" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Details</label>
                                <textarea name="details" class="form-control" cols="30"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-primary">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('title')
    Add News
@endsection
