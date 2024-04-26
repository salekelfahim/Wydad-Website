@extends('layouts.main')

@section('content')

<div class="welcome-page">
  <h2 class="mb-1 display-5 text-center">Our Team</h2>
  <p>You Can See All the First TeamPlayers Here! Thank You.</p>
</div>

<!-- Team 1 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <div class="input-group rounded">
          <input type="search" id="search_title" class="form-control rounded" placeholder="Search" name="title_s" aria-label="Search" aria-describedby="search-addon" />
          <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
          </span>
        </div>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container overflow-hidden">
    <div id="search_result" class="row gy-4 gy-lg-0 gx-xxl-5">
      @foreach ($players as $player)
      <div class="col-12 col-md-6 col-lg-3 mb-5">
        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
          <div class="card-body p-0">
            <figure class="m-0 p-0">
              <img class="img-fluid" loading="lazy" src="{{ asset('storage/' . $player->picture) }}" alt="">
              <figcaption class="m-0 p-4">
                <h4 class="mb-1">{{$player->firstname}} {{$player->lastname}}</h4>
                <p class="text-secondary mb-0">{{$player->position->position}}</p>
                <div class="d-grid justify-content-end">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#playerModal{{$player->id}}">
                  Details
                </button>
                </div>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="playerModal{{$player->id}}" tabindex="-1" aria-labelledby="playerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="playerModalLabel">Player Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center">
                <div class="col-md-8 justify-content-center mb-5">
                  <img src="{{ asset('storage/' . $player->picture) }}" class="img-fluid rounded"  alt="Player Image">
                </div>
                <div class="col-md-8 text-center">
                  <h5>Name: {{$player->firstname}} {{$player->lastname}}</h5>
                  <p>Birthday: {{ \Carbon\Carbon::parse($player->birthday)->format('d M Y') }}</p>
                  <p>Nationality: {{$player->nationality}}</p>
                  <p>Number: {{$player->number}}</p>
                  <p>Position: {{$player->position->position}}</p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{$players->links()}}
</section>




@endsection