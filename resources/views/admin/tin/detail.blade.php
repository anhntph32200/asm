@extends('admin.layouts.index')

@section('title')
    QL Tin
@endsection

@section('title2')
    Chi tiết tin
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Chi tiết tin</h4>
                    <a href="{{ route('news.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-bordered table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Img</th>
                                <th scope="col">View</th>
                                <th scope="col">Create_at</th>
                                <th scope="col">Update_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($news->toArray() as $field => $value)
                            <tr>
                                <th scope="row" style=" text-transform: capitalize;">{{ $field }}</th>
                                <td>
                                    @if ($field == 'img')
                                        <img src="{{ asset($value) }}" alt="" width="100px">
                                    @elseif($field == 'category_id')
                                        {{ $news->category->name}}
                                    @else
                                    {{ $value }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach --}}
                            <td>{{ $news->id }}</td>
                            <td>
                                <img src="{{ asset($news->image) }}" alt="" width="100px">
                            </td>
                            <td>{{ $news->views }}</td>
                            <td>{{ $news->created_at }}</td>
                            <td>{{ $news->updated_at }}</td>
                        </tbody>
                    </table>
                    <!-- Accordions Fill Colored -->
                    <div class="accordion custom-accordionwithicon accordion-fill-success" id="accordionFill">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="accordionFillExample1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accor_fill1" aria-expanded="true" aria-controls="accor_fill1">
                                    Category: {{ $news->category->name }} <br> 
                                    Title: {{ $news->title }}
                                </button>
                            </h2>
                            <div id="accor_fill1" class="accordion-collapse collapse show"
                                aria-labelledby="accordionFillExample1" data-bs-parent="#accordionFill">
                                <div class="accordion-body">
                                    {{ $news->content }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
