@extends('layouts.admin')

@section('content')

    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <section class="ezy__numbers13 light">
  <div class="container">
    <div class="row text-center justify-content-center">
      <div class="col-12 col-md-5 mt-4">
        <div class="ezy__numbers13-card p-4 p-lg-5">
          <h2 class="ezy__numbers13-heading mb-3">{{$product}}</h2>
          <h4>Number Of Sales</h4>
          <p class="mt-2 opacity-75">
This is the total number of sales in our products          </p>
        </div>
      </div>
      <div class="col-12 col-md-5 mt-4">
        <div class="ezy__numbers13-card p-4 p-lg-5">
          <h2 class="ezy__numbers13-heading mb-3">{{$tickets}}</h2>
          <h4>Tickets Soldes</h4>
          <p class="mt-2 opacity-75">
          This is the total number of sales in our Tickets            </p>
        </div>
      </div>
      <div class="col-12 col-md-5 mt-4">
        <div class="ezy__numbers13-card p-4 p-lg-5">
          <h2 class="ezy__numbers13-heading mb-3">{{$products}}</h2>
          <h4>Our Products</h4>
          <p class="mt-2 opacity-75">
          This is the total number of our products  
          </p>
        </div>
      </div>
      <div class="col-12 col-md-5 mt-4">
        <div class="ezy__numbers13-card p-4 p-lg-5">
          <h2 class="ezy__numbers13-heading mb-3">{{$Ntickets}}</h2>
          <h4>Aviable Tickets</h4>
          <p class="mt-2 opacity-75">
          This is the total number of tickets that aviable for sale            </p>
        </div>
      </div>
    </div>
  </div>
</section>
      </div>
    </main>
 
    @endsection