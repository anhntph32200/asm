<div class="header-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo">
                    <a href="{{ route('user.index') }}"><img src="{{ asset('images/version/Thiết kế chưa có tên (2).png') }}" alt=""></a>
                </div><!-- end logo -->
            </div>
        </div><!-- end row -->
    </div><!-- end header-logo -->
</div><!-- end header -->

<header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-toggleable-md">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest Timemenu" aria-controls="Forest Timemenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link color-green-hover" href="{{ route('user.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-green-hover" href="#">Bóng đá</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-green-hover" href="#">Lịch thi đấu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-green-hover" href="#">Các môn khác</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-green-hover" href="#">Video</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link color-green-hover" href="{{ route('user.contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div><!-- end container -->
</header><!-- end header -->