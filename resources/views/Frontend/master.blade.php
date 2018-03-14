@include('Frontend.layouts.head')


<div class="flex-center position-ref full-height">
    <div class="content">
        @yield('content')
        @include('Frontend.layouts.nav')
    </div>
</div>

        @include('Frontend.layouts.foot')