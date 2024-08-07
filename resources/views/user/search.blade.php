@extends('user.layouts.layout')

@section('content')
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-list clearfix">
                            <!--row -->
                            @if ($data->isNotEmpty())
                                <h1>Kết quả tìm kiếm</h1>
                                <ul>
                                    @foreach ($data as $row)
                                        <div class="blog-box row">
                                            <div class="col-md-4">
                                                <div class="post-media">
                                                    <a href="{{ route('user.show', $row->id) }}" title="">
                                                        <img src="{{ $row->image }}" alt="{{ $row->title }}" class="img-fluid">
                                                        <div class="hovereffect"></div>
                                                    </a>
                                                </div><!-- end media -->
                                            </div><!-- end col -->

                                            <div class="blog-meta big-meta col-md-8">
                                                <span class="bg-aqua"><a href="{{ route('user.category', $row->category_id) }}"
                                                    title="">{{ $row->category->name }}</a></span>
                                                <h4><a
                                                        href="{{ route('user.show', $row->id) }}">{{ $row->title }}</a>
                                                </h4>
                                                <p>{{ Str::limit($row->content, 100) }}</p>
                                                <small><a href="garden-category.html" title=""><i
                                                            class="fa fa-eye"></i>
                                                        1887</a></small>
                                                <small><a href="garden-single.html" title="">11 July, 2017</a></small>
                                                <small><a href="#" title="">by Matilda</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                        <hr class="invis">
                                    @endforeach
                                </ul>
                            @else
                                <p>Không tìm thấy kết quả nào.</p>
                            @endif
                        </div><!-- end blog-list -->
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <h2 class="widget-title">Search</h2>
                            <form class="form-inline search-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search on the site">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Recent Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="garden-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/garden_sq_09.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                            <small>12 Jan, 2016</small>
                                        </div>
                                    </a>

                                    <a href="garden-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/garden_sq_06.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                            <small>11 Jan, 2016</small>
                                        </div>
                                    </a>

                                    <a href="garden-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 last-item justify-content-between">
                                            <img src="upload/garden_sq_02.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                            <small>07 Jan, 2016</small>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Advertising</h2>
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="upload/banner_04.jpg" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Instagram Feed</h2>
                            <div class="instagram-wrapper clearfix">
                                <a href="#"><img src="upload/garden_sq_01.jpg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/garden_sq_02.jpg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/garden_sq_03.jpg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/garden_sq_04.jpg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/garden_sq_05.jpg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/garden_sq_06.jpg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/garden_sq_07.jpg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/garden_sq_08.jpg" alt=""
                                        class="img-fluid"></a>
                                <a href="#"><img src="upload/garden_sq_09.jpg" alt=""
                                        class="img-fluid"></a>
                            </div><!-- end Instagram wrapper -->
                        </div><!-- end widget -->

                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">Gardening <span>(21)</span></a></li>
                                    <li><a href="#">Outdoor Living <span>(15)</span></a></li>
                                    <li><a href="#">Indoor Living <span>(31)</span></a></li>
                                    <li><a href="#">Shopping Guides <span>(22)</span></a></li>
                                    <li><a href="#">Pool Design <span>(66)</span></a></li>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection