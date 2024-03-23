@extends('layouts.admin')

@section('content')


<div style="margin-left: 17%;" class="container mt-3 mb-4">
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <thead>
                            <tr>
                                <th>Players List</th>
                                <th class="text-center">Status</th>
                                <th class="action text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                            <tr class="candidates-list">
                                <td class="title">
                                    <div class="thumb">
                                        <img class="img-fluid" src="{{ asset('storage/' . $player->picture) }}" alt="">
                                    </div>
                                    <div class="candidate-list-details">
                                        <div class="candidate-list-info">
                                            <div class="candidate-list-title">
                                                <h5 class="mb-0">{{$player->firstname}} {{$player->lastname}}</h5>
                                            </div>
                                            <div class="candidate-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-filter pr-1"></i>{{$player->position}}</li>
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
                                        <li data-bs-toggle="modal" data-bs-target="#exampleModal{{$player->id}}" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></li>
                                        <li><a href="#" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a></li>
                                    </ul>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$player->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Player</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" class="mx-auto" action="{{ route('player.update', $player->id) }}" enctype="multipart/form-data" style="width: 55%;">
                                                @csrf
                                                @method ('PUT')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">First Name</label>
                                                            <input type="text" id="firstname" name="firstname" value="{{$player->firstname}}" class="form-control">
                                                            @error('firstname')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="lastname" class="form-label">Last Name</label>
                                                            <input type="text" id="lastname" name="lastname" value="{{$player->lastname}}" class="form-control">
                                                            @error('lastname')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mb-3">
                                                    <label for="nationality" class="form-label">Nationality</label>
                                                    <input type="text" id="nationality" name="nationality" value="{{$player->nationality}}" class="form-control">
                                                    @error('nationality')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="form4Example3" class="form-label">Birthday</label>
                                                    <input type="date" id="birthday" name="birthday" value="{{$player->birthday}}" class="form-control">
                                                    @error('birthday')
                                                    <div class="alert alert-danger">- {{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="number" class="form-label">Number</label>
                                                            <input type="number" id="number" name="number" value="{{$player->number}}" class="form-control">
                                                            @error('number')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="position" class="form-label">Position</label>
                                                            <select id="position" name="position" class="form-select">
                                                                <option value="{{$player->position}}">{{$player->position}}</option>
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
                                                    <img src="{{ asset('storage/' . $player->picture) }}" height="40%" width="40%" alt="Player">
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

                            @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection