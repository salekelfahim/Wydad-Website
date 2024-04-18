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
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Game</button>
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <thead>
                            <tr>
                                <th>Opponents</th>
                                <th class="text-center">Compitition</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Date</th>
                                <th class="action text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="candidates-list">
                                @foreach ($games as $game)
                                <td class="title">
                                    <div class="candidate-list-details">
                                        <div class="candidate-list-info">
                                            <div class="candidate-list-title">
                                                <h5 class="mb-0">- {{$game->opponent}}</h5>
                                            </div>
                                            <div class="candidate-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-filter pr-1">{{$game->stadium}}</i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="candidate-list-favourite-time text-center">
                                    <span class="candidate-list-time order-1">{{$game->compitition->compitition}}</span>
                                </td>
                                @if ($game->status === 0)
                                <td class="candidate-list-favourite-time text-center">
                                    <span class="candidate-list-time order-1">Home</span>
                                </td>
                                @else
                                <td class="candidate-list-favourite-time text-center">
                                    <span class="candidate-list-time order-1">AWAY</span>
                                </td>
                                @endif
                                <td class="candidate-list-favourite-time text-center">
                                    <span class="candidate-list-time order-1">{{$game->date}}</span>
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0 d-flex">
                                        <li data-bs-toggle="modal" data-bs-target="#EditModal{{$game->id}}" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></li>
                                        <form action="{{ route('game.delete', $game->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this game?')"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </ul>
                                </td>
                            </tr>

                            <!--  Edit Modal -->
                            <div class="modal fade" id="EditModal{{$game->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Game</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" class="mx-auto" action="{{ route('game.update', $game->id) }}" enctype="multipart/form-data" style="width: 55%;">
                                                @csrf
                                                @method ('PUT')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="opponent" class="form-label">Opponent</label>
                                                            <input type="text" id="opponent" name="opponent" value="{{$game->opponent}}" class="form-input">
                                                            @error('opponent')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="compitition" class="form-label">Compitition</label>
                                                            <select class="form-select" name="compitition" id="compitition">
                                                                <option value="{{$game->compitition->id}}">{{$game->compitition->compitition}}</option>
                                                                @foreach ($compititions as $compitition)
                                                                <option value="{{$compitition->id}}">{{$compitition->compitition}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Date</label>
                                                            <input type="date" id="date" value="{{$game->date}}" name="date" class="form-input">
                                                            @error('date')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select class="form-select" name="status" id="status">
                                                                <option value="0">HOME</option>
                                                                <option value="1">AWAY</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="stadium" class="form-label">Stadium</label>
                                                        <input type="text" id="stadium" name="stadium" value="{{$game->stadium}}" class="form-input">
                                                        @error('stadium')
                                                        <div class="alert alert-danger">- {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-dark">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            @endforeach
                            <!--  Add Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Game</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" class="mx-auto" action="{{route ('addgame')}}" enctype="multipart/form-data" style="width: 55%;">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="opponent" class="form-label">Opponent</label>
                                                            <input type="text" id="opponent" name="opponent" value="" class="form-input">
                                                            @error('opponent')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="compitition" class="form-label">Compitition</label>
                                                            <select class="form-select" name="compitition" id="compitition">
                                                                @foreach ($compititions as $compitition)
                                                                <option value="{{$compitition->id}}">{{$compitition->compitition}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Date</label>
                                                            <input type="date" id="date" name="date" class="form-input">
                                                            @error('date')
                                                            <div class="alert alert-danger">- {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select class="form-select" name="status" id="status">
                                                                <option value="0">HOME</option>
                                                                <option value="1">AWAY</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="stadium" class="form-label">Stadium</label>
                                                        <input type="text" id="stadium" name="stadium" value="" class="form-input">
                                                        @error('stadium')
                                                        <div class="alert alert-danger">- {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-dark">Save</button>
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