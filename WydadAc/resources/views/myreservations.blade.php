@extends('layouts.main')

@section('content')

<div class="welcome-page">
        <h2 class="mb-1 display-5 text-center">My Reservations</h2>
    <p>You Can See All Your Tickets and Products Here! Thank You.</p>
</div>

<section class="ezy__careers11 light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between">
          <h2 class="ezy__careers11-heading">Products</h2>
        </div>
      </div>

      <div class="mt-5">
        <!-- card start -->
        @foreach($products as $product)
        <div class="ezy__careers11-card position-relative">
          <div class="ezy__careers11-logo">
            <img class="apple-logo" src="{{ asset('storage/' . $product->product->cover) }}" alt="" />
          </div>
          <div class="row p-3 p-lg-4 align-items-center justify-content-center text-center text-lg-start">
            <div class="col-12 col-lg-4">
              <div class="ms-3 mt-4 mt-lg-0">
                <a href="#"><h4>{{$product->product->name}}</h4></a>
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start mt-3">
                  <p class="opacity-75">Quantity: {{$product->quantity}}</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-5">
              <div
                class="ezy__careers11-tags d-flex align-items-center justify-content-center justify-content-lg-end mt-2 mt-lg-0">
                <p>Bought</p>
              </div>
            </div>
            <div class="col-12 col-lg-3">
              <div class="d-flex justify-content-center justify-content-lg-end mt-3 mt-lg-0">
                <p class="fw-bold me-lg-5 mb-0"> {{ \Carbon\Carbon::parse($product->created_at)->format('d M Y') }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- card-end -->
      </div>
    </div>
  </div>
</section>

<section class="ezy__careers11 light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between">
          <h2 class="ezy__careers11-heading">Tickets</h2>
        </div>
      </div>

      <div class="mt-5">
        <!-- card start -->
        @foreach($tickets as $ticket)
        <div class="ezy__careers11-card position-relative">
          <div class="row p-3 p-lg-4 align-items-center justify-content-center text-center text-lg-start">
            <div class="col-12 col-lg-4">
              <div class="ms-3 mt-4 mt-lg-0">
                <a href="#"><h4>{{$ticket->ticket->game->opponent}}</h4></a>
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start mt-3">
                  <p class="opacity-75">Price: {{$ticket->ticket->price}}DH</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-5">
              <div
                class="ezy__careers11-tags d-flex align-items-center justify-content-center justify-content-lg-end mt-2 mt-lg-0">
                <p>Bought</p>
              </div>
            </div>
            <div class="col-12 col-lg-3">
              <div class="d-flex justify-content-center justify-content-lg-end mt-3 mt-lg-0">
                <p class="fw-bold me-lg-5 mb-0"> Date: {{ \Carbon\Carbon::parse($ticket->ticket->game->date)->format('d M Y') }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- card-end -->
      </div>
    </div>
  </div>
</section>

@endsection