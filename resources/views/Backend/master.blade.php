@include('Backend.layouts.head')


<div class="container body">
    <div class="main_container">

    @include('Backend.layouts.nav')


    @include('Backend.layouts.actionbar')


    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>

                @yield('content')

            </div>
        </div>
        <!-- /page content -->


        @include('Backend.layouts.footer')

    </div>
</div>


@include('Backend.layouts.foot')


