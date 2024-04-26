@extends('layouts.main')

@section('content')

<div class="welcome-page">
    <h2 class="mb-1 display-5 text-center">Our Products</h2>
    <p>You Can See Our Products Here.
    </p>
</div>

<!-- Team 1 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
            </div>
        </div>
    </div>

    <div class="container overflow-hidden">
        <div class="row gy-4 gy-lg-0 gx-xxl-5">
            @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-3 mb-5">
                <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                    <div class="card-body p-0">
                        <figure class="m-0 p-0">
                            <img class="img-fluid" loading="lazy" src="{{ asset('storage/' . $product->cover) }}" alt="">
                            <figcaption class="m-0 p-4">
                                <h4 class="mb-1">{{$product->name}}</h4>
                                <p class="text-secondary mb-0">{{$product->price}} DH</p>
                                <div class="d-grid justify-content-end">
                                    <a href="{{ route('product.details', $product->id) }}" class="btn btn-black">Details</a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{$products->links()}}


@endsection