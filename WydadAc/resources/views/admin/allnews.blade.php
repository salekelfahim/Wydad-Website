@extends('layouts.admin')

@section('content')

@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger" id="alert">
    {{ session('error') }}
</div>
@endif
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">
  Launch demo modal
</button>

<!-- Add Modal -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" class="mx-auto" action="{{ route('addnews') }}" enctype="multipart/form-data" style="width: 55%;">
                                                @csrf
                                                @method ('POST')

                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" id="title" name="title" class="form-control">
                                                    @error('title')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="form4Example3" class="form-label">Content</label>
                                                    <textarea type="text" rows="5" id="content" name="content" class="form-control"></textarea>
                                                    @error('content')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="mb-3">
                                                    <label for="form4Example3" class="form-label">Picture</label>
                                                    <input type="file" id="picture" name="picture" class="form-control" accept="image/*">
                                                    @error('picture')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


<div style="margin-left: 17%;" class="container mt-3 mb-4">
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <thead>
                            <tr>
                                <th>All News</th>
                                <th class="text-center">Title</th>
                                <th class="action text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $new)
                            <tr class="candidates-list">
                                <td class="title">
                                    <div class="thumb">
                                        <img class="img-fluid" src="{{ asset('storage/' . $new->picture) }}" alt="">
                                    </div>
                                    <div class="candidate-list-details">
                                        <div class="candidate-list-info">
                                            <div class="candidate-list-title">
                                                <h5 class="mb-0">{{$new->title}}</h5>
                                            </div>
                                            <div class="candidate-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-filter pr-1"></i>-</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="candidate-list-favourite-time text-center">
                                    <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-heart"></i></a>
                                    <span class="candidate-list-time order-1">Shortlisted</span>
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                        <li><a href="#" class="text-primary" data-toggle="tooltip" title="" data-original-title="view"><i class="far fa-eye"></i></a></li>
                                            <li data-bs-toggle="modal" data-bs-target="#exampleModal{{$new->id}}" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></li>
                                        <form action="{{ route('news.delete', $new->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this News?')"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </ul>
                                </td>
                            </tr>

                            


                            <!-- Update Modal -->
                            <div class="modal fade" id="exampleModal{{$new->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit News</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" class="mx-auto" action="{{ route('news.update', $new->id) }}" enctype="multipart/form-data" style="width: 55%;">
                                                @csrf
                                                @method ('PUT')
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" id="title" name="title" value="{{$new->title}}" class="form-control">
                                                    @error('title')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="form4Example3" class="form-label">Content</label>
                                                    <textarea type="text" rows="5" id="content" name="content" class="form-control">{{$new->content}}</textarea>
                                                    @error('content')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection