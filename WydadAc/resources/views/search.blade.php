@if ($players->isNotEmpty())
@foreach ($players as $player)
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
          <div class="card-body p-0">
            <figure class="m-0 p-0">
              <img class="img-fluid" loading="lazy" src="{{ asset('storage/' . $player->picture) }}" alt="">
              <figcaption class="m-0 p-4">
                <h4 class="mb-1">{{$player->firstname}} {{$player->lastname}}</h4>
                <p class="text-secondary mb-0">{{$player->position->position}}</p>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
   @endforeach
        @else <div class="text-center" style="margin-bottom: 20%; margin-top: 10%">
        <h2 class="welcome-message">No Results Found For this Name!</h2>
        </div>
        @endif
