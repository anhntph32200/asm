@extends('admin.layouts.index')

@section('title')
    QL Tin
@endsection

@section('title2')
    Thêm tin
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm tin</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="category_id">Loại tin</label>
                                    <select class="form-select" id="category_id" name="category_id">
                                        @foreach ($category as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div>
                                    <label for="basiInput" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div>
                                    <label for="exampleFormControlTextarea5" class="form-label">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="10"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div> <!-- end col -->

            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
