@extends('admin.layouts.index')

@section('title')
    QL Loại Tin
@endsection

@section('title2')
    Thêm loại tin
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
                    <h4 class="card-title mb-0 flex-grow-1">Thêm loại tin</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf

                            <div class="col-lg-6 mb-3">
                                <div>
                                    <label for="basiInput" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
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
