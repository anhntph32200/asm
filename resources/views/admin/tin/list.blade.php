@extends('admin.layouts.index')

@section('title')
    QL Tin
@endsection

@section('title2')
    Danh sách tin
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
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách tin</h4>
                    <a href="{{ route('news.create') }}"><button type="button" class="btn btn-primary">Create</button></a>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-bordered table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Img</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($data as $row)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td>
                                        <img src="{{ asset($row->image) }}" alt="" width="100px">
                                    </td>
                                    <td><span class="badge bg-primary-subtle text-primary">{{ $row->title }}</span></td>
                                    <td>{{ Str::limit($row->content, 40) }}</td>
                                    <td>{{ $row->category->name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{ route('news.show', $row) }}">View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="{{ route('news.edit', $row) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('news.destroy', $row) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item"
                                                            onclick="return confirm('Bạn có muốn xóa tin này?')"
                                                            type="submit">Delete</button>
                                                    </form>
                                                </li>
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
