@extends('admin.layouts.index')

@section('title')
    QL Loại Tin
@endsection

@section('title2')
    Danh sách loại tin
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách loại tin</h4>
                    <a href="{{ route('categories.create') }}"><button type="button"
                            class="btn btn-primary">Create</button></a>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-bordered table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Create_at</th>
                                <th scope="col">Update_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($data as $row)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <th><span class="bg-primary-subtle text-primary">{{ $row->name }}</span></th>
                                    <th scope="row">{{ $row->created_at }}</th>
                                    <th scope="row">{{ $row->updated_at }}</th>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('categories.edit', $row) }}">Edit</a></li>
                                                <form action="{{ route('categories.destroy', $row) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item"
                                                        onclick="return confirm('Bạn có muốn xóa loại tin này?')"
                                                        type="submit">Delete</button>
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{ $data->links() }}
                </div> <!-- end col -->

            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
