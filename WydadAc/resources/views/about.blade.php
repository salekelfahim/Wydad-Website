@extends('layouts.main')

@section('content')

<section class="ezy__header11 light">
  <svg class="position-absolute end-0 top-0" width="686" height="630" viewBox="0 0 686 630"
    fill="var(--ezy-shape-color)" xmlns="http://www.w3.org/2000/svg">
    <ellipse cx="403.5" cy="231.894" rx="403.5" ry="397.98" fill="var(--ezy-shape-color)" />
  </svg>

  <div class="container position-relative">
    <div class="row align-items-center">
      <div class="col-lg-6 pe-xl-5 text-center text-lg-start">
        <h2 class="ezy__header11-heading mb-4">Wydad Athletic Club</h2>
        <p class="ezy__header11-sub-heading">
        Wydad Athletic Club commonly referred to as Wydad AC and known as Wydad, Wydad Casablanca, or simply as WAC, is a Moroccan sports club based in Casablanca. Wydad AC is best known for its professional football team that competes in Botola, the top tier of the Moroccan football league system. They are one of three clubs to have never been relegated from the top flight.
        </p>
      </div>
      <div class="col-lg-6 mt-5 mt-lg-0 text-center text-lg-start">
        <img src="{{ asset('images/Logo_Wydad_Athletic_Club.png') }}" alt="" class="rounded img-fluid mt-3" />
      </div>
    </div>
  </div>
</section>

@endsection