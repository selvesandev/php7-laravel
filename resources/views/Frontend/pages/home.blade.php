@extends('Frontend.master')


@section('content')
    <div class="title m-b-md">
        HOME
    </div>
    <p>
        Hello {{$name}}. You live in {{$address}} since {{$age}} years.
    </p>
@endsection

