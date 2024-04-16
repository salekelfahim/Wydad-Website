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
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <thead>
                            <tr>
                                <th>Products List</th>
                                <th class="text-center">S</th>
                                <th class="text-center">M</th>
                                <th class="text-center">L</th>
                                <th class="text-center">XL</th>
                                <th class="text-center">XLL</th>
                                <th class="text-center">XLLL</th>
                                <th class="action text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="candidates-list">
                                <td class="title">
                                    <div class="thumb">
                                        <img class="img-fluid" src="{{ asset('storage/' . $product->cover) }}" alt="">
                                    </div>
                                    <div class="candidate-list-details">
                                        <div class="candidate-list-info">
                                            <div class="candidate-list-title">
                                                <h5 class="mb-0">{{$product->name}}</h5>
                                            </div>
                                            <div class="candidate-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-filter pr-1"></i>{{$product->type->types}}</li>
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

                            @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection