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

<div style="margin-left: 17%;" class="container mt-3 mb-4">
<button class="btn btn-dark">Add Game</button>
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <thead>
                            <tr>
                                <th>Opponents</th>
                                <th class="text-center">Status</th>
                                <th class="action text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="candidates-list">
                                <td class="title">
                                    <div class="thumb">
                                        <img class="img-fluid" src="" alt="">
                                    </div>
                                    <div class="candidate-list-details">
                                        <div class="candidate-list-info">
                                            <div class="candidate-list-title">
                                                <h5 class="mb-0"></h5>
                                            </div>
                                            <div class="candidate-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-filter pr-1"></i></li>
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
                                        <li data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></li>
                                        <form action="" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this player?')"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </ul>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Player</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" class="mx-auto" action="" enctype="multipart/form-data" style="width: 55%;">
                                                @csrf
                                                @method ('POST')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="opponent" class="form-label">Opponent</label>
                                                            <input type="text" id="opponent" name="opponent" value="" class="form-control">
                                                            @error('opponent')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="lastname" class="form-label">Last Name</label>
                                                            <input type="text" id="lastname" name="lastname" value="" class="form-control">
                                                            @error('lastname')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mb-3">
                                                    <label for="nationality" class="form-label">Nationality</label>
                                                    <input type="text" id="nationality" name="nationality" value="" class="form-control">
                                                    @error('nationality')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="form4Example3" class="form-label">Birthday</label>
                                                    <input type="date" id="birthday" name="birthday" value="" class="form-control">
                                                    @error('birthday')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="number" class="form-label">Number</label>
                                                            <input type="number" id="number" name="number" value="" class="form-control">
                                                            @error('number')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="position" class="form-label">Position</label>
                                                            <select id="position" name="position" class="form-select">
                                                                <option value=""></option>
                                                                <option value="Goalkeeper">Goalkeeper</option>
                                                                <option value="Defender">Defender</option>
                                                                <option value="Midfielder">Midfielder</option>
                                                                <option value="Forward">Forward</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="mb-3">
                                                    <label for="form4Example3" class="form-label">Image</label>
                                                    <input type="file" id="picture" name="picture" class="form-control" accept="image/*">
                                                    <img src="" height="40%" width="40%" alt="Player">
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

                        
                </div>
            </div>
        </div>
    </div>
</div>


@endsection