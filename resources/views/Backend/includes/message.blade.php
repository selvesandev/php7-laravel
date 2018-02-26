@if(session('success'))
    <div class="alert alert-success">
        <i class="fa fa-check-circle"></i> {{session('success')}}
    </div>
@elseif(session('fail'))
    <div class="alert alert-success">
        <i class="fa fa-times"></i> {{session('fail')}}
    </div>
@endif