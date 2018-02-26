@foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <i class="fa fa-times"></i> {{$error}}
    </div>
@endforeach