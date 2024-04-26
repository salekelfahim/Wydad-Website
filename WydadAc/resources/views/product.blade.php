@extends('layouts.main')

@section('content')

<div class="welcome-page">
</div>

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
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('storage/' . $product->cover) }}" />
          </a>
        </div>
        <div class="d-flex justify-content-center mb-3">
            @foreach($images as $image)
          <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" class="item-thumb">
            <img width="60" height="60" class="rounded-2" src="{{ asset('storage/' . $image->picture) }}" />
          </a>
          @endforeach
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h3 class="title text-dark">
            {{$product->name}}
          </h3>
          <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                4.5
              </span>
            </div>
            <span class="text-success ms-2">In stock</span>
          </div>

          <div class="mb-3">
            <span class="h5">{{$product->price}}</span>
            <span class="text-muted">DH</span>
          </div>

          <p>
            {{$product->description}}
          </p>

          <hr />
            <form action="{{route ('buyproduct')}}" method="post">
            @csrf
                <input type="hidden" name="product" value="{{$product->id}}">
          <div class="row mb-4">
            <div class="col-md-4 col-6">
              <label class="mb-2">Size</label>
              <select class="form-select border border-secondary" name="size" style="height: 35px;">
              @foreach ($sizes as $size)
                <option value="{{$size->id}}">{{$size->size}}</option>
                @endforeach
              </select>
            </div>
            <!-- col.// -->
            <div class="col-md-4 col-6 mb-3">
              <label class="mb-2 d-block">Quantity</label>
              <div class="input-group mb-3" style="width: 170px;">
                <input type="number" name="quantity" class="form-control text-center border border-secondary" value="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-warning shadow-0"> Buy now </button>
          </form>
        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->

<section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
      <div class="container">
        <div class="row">
          <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Similar Items</h2>
            <div class="btn-right">
              <a href="/products" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
            </div>
          </div>
            <div class="swiper-wrapper d-flex justify-content-between">
              @foreach ($products as $product)
              <div class="swiper-slide" style="width: 250px; height: 250px;">
                <div class="product-card position-relative" >
                  <div class="image-holder">
                    <img src="{{ asset('storage/' . $product->cover) }}" alt="product-item" class="img-fluid" >
                  </div>
                  <div class="cart-concern position-absolute">
                    <div class="cart-button d-flex">
                      <a href="{{ route('product.details', $product->id) }}" class="btn btn-medium btn-black">Details<svg class="cart-outline"><use xlink:href=""></use></svg></a>
                    </div>
                  </div>
                  <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                    <h3 class="card-title text-uppercase">
                      <a href="#">{{$product->name}}</a>
                    </h3>
                    <span class="item-price text-primary">{{$product->price}} DH</span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
        </div>
      </div>
      <div class="swiper-pagination position-absolute text-center"></div>
    </section>


@endsection