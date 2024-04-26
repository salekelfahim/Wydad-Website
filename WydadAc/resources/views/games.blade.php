@extends('layouts.main')

@section('content')


<div class="welcome-page">
  <p></p>
  <h2 class="mb-1 display-5 text-center">Our Next Games</h2>
  <p>You Can Get Your Tickets From Here.</p>
</div>
<div class="container">
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
  <div class="row">
    @foreach($games as $game)
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title text-center">--- WAC vs {{ $game->opponent }} ---</h5>
          <p class="card-text">Compitition: {{ $game->compitition->compitition }}</p>
          <p class="card-text">Date: {{ $game->date }}</p>
          @if($game->status === 1)
          <p class="card-text">Status: HOME</p>
          @else
          <p class="card-text">Status: AWAY</p>
          @endif
          <p class="card-text">Stadium: {{ $game->stadium }}</p>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $game->id }}">
            Get Tickets </button>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal{{ $game->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Choose Your Ticket</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('createReservation') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="game_id" value="{{ $game->id }}">
              <div class="modal-body">
                <label for="form4Example3" class="form-label">Category:</label>
                <select id="type" name="ticket" class="form-control">
                  @foreach ($game->tickets as $ticket)
                  <option value="{{ $ticket->id }}">{{ $ticket->category->category}} - {{ $ticket->price }}DH</option>
                  @endforeach
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if ( $game->tickets->isEmpty())
                <button class="btn btn-danger" disabled>Sold Out</button>
                @else
                <button type="submit" class="btn btn-dark">Reserve</button>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>



@endsection