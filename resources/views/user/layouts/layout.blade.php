<!DOCTYPE html>
@include('user.partials.header')
<body>

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline">
                        <input type="text" class="form-control" placeholder="What you are looking for?">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->

        @include('user.partials.topbar')

        @include('user.partials.menu')

        @yield('content')

        @include('user.partials.footer')

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->
    @include('user.partials.js')
</body>
</html>