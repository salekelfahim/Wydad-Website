@extends('layouts.main')

@section('content')


    <section id="billboard" class="position-relative overflow-hidden bg-light-blue">
      <div class="swiper main-swiper" style="margin-top: 6%">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-md-6">
                  <div class="banner-content">
                    <h1 class="display-2 text-uppercase text-dark pb-5">WAC Unofficial Website</h1>
                    <a href="/about" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">About Us</a>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="image-holder">
                    <img src="{{ asset('images/Logo_Wydad_Athletic_Club.png') }}" alt="banner" style="height: auto; width:350px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="container">
              <div class="row d-flex flex-wrap align-items-center">
                <div class="col-md-6">
                  <div class="banner-content">
                    <h1 class="display-2 text-uppercase text-dark pb-5">Technology Hack You Won't Get</h1>
                    <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="image-holder">
                    <img src="{{ asset('images/Logo_Wydad_Athletic_Club.png') }}" alt="banner">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-icon swiper-arrow swiper-arrow-prev">
        <svg class="chevron-left">
          <use xlink:href="#chevron-left" />
        </svg>
      </div>
      <div class="swiper-icon swiper-arrow swiper-arrow-next">
        <svg class="chevron-right">
          <use xlink:href="#chevron-right" />
        </svg>
      </div>
    </section>
    <section id="company-services" class="padding-large">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
              <svg class="shield-plus">
                  <use xlink:href="#shield-plus" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Botola</h3>
                <p>Wydad has won a record of 22 Moroccan league titles.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
              <svg class="shield-plus">
                  <use xlink:href="#shield-plus" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Throne Cup</h3>
                <p>Wydad has won 9 Moroccan Throne Cup.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
              <svg class="shield-plus">
                  <use xlink:href="#shield-plus" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">CAF Champions League</h3>
                <p>Wydad has won 3 CAF Champions League.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="shield-plus">
                  <use xlink:href="#shield-plus" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">African Super Cup</h3>
                <p>Wydad has won 1 African Super Cup.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
      <div class="container">
        <div class="row">
          <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Our Products</h2>
            <div class="btn-right">
              <a href="/products" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
            </div>
          </div>
            <div class="swiper-wrapper d-flex justify-content-between">
              @foreach ($products as $product)
              <div class="swiper-slide" style="width: 400px; height: 600px;">
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
    <section id="smart-watches" class="product-store padding-large position-relative">
      <div class="container">
        <div class="row">
          <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Our Players</h2>
            <div class="btn-right">
              <a href="/players" class="btn btn-medium btn-normal text-uppercase">See All Team</a>
            </div>
          </div>
            <div class="swiper-wrapper d-flex justify-content-between">
              @foreach ($players as $player)
              <div class="swiper-slide" style="width: 400px; height: 600px;">
                <div class="product-card position-relative">
                  <div class="image-holder">
                    <img src="{{ asset('storage/' . $player->picture) }}" alt="product-item" class="img-fluid">
                  </div>
                  <div class="cart-concern position-absolute">
                    <div class="cart-button d-flex">
                      <a  class="btn btn-medium btn-black">{{$player->position->position}}<svg class="cart-outline"></svg></a>
                    </div>
                  </div>
                  <div class="card-detail d-flex justify-content-center">
                    <h3 class="card-title text-uppercase">
                      {{$player->firstname}} {{$player->lastname}}
                    </h3>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
        </div>
      </div>
      <div class="swiper-pagination position-absolute text-center"></div>
    </section>
    <section id="latest-blog" class="padding-large">
      <div class="container">
        <div class="row">
          <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Latest Posts</h2>
            <div class="btn-right">
              <a href="blog.html" class="btn btn-medium btn-normal text-uppercase">Read Blog</a>
            </div>
          </div>
          <div class="post-grid d-flex flex-wrap justify-content-between">
            @foreach($newss as $news)
            <div class="col-lg-4 col-sm-12">
              <div class="card border-none me-3">
                <div class="card-image">
                  <img src="{{ asset('storage/' . $news->picture) }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">feb 22, 2023</span>
                </div>
                <h3 class="card-title">
                  <a href="{{ route('news.details', $news->id ) }}">{{$news->title}}</a>
                </h3>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials" class="position-relative">
      <div class="container">
        <div class="row">
          <div class="review-content position-relative">
            <div class="swiper-icon swiper-arrow swiper-arrow-prev position-absolute d-flex align-items-center">
              <svg class="chevron-left">
                <use xlink:href="#chevron-left" />
              </svg>
            </div>
            <div class="swiper testimonial-swiper">
              <div class="quotation text-center">
                <svg class="quote">
                  <use xlink:href="#quote" />
                </svg>
              </div>
              <div class="swiper-wrapper">
                <div class="swiper-slide text-center d-flex justify-content-center">
                  <div class="review-item col-md-10">
                    <i class="icon icon-review"></i>
                    <blockquote>“Through the highs and lows, we stand by Wydad Athletic Club, for it represents the spirit of determination and triumph.”</blockquote>
                    <div class="rating">
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-half">
                        <use xlink:href="#star-half"></use>
                      </svg>
                      <svg class="star star-empty">
                        <use xlink:href="#star-empty"></use>
                      </svg>
                    </div>
                    <div class="author-detail">
                      <div class="name text-dark text-uppercase pt-2">Supporters</div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide text-center d-flex justify-content-center">
                  <div class="review-item col-md-10">
                    <i class="icon icon-review"></i>
                    <blockquote>“In victory or defeat, the spirit of Wydad Athletic Club shines bright, illuminating our path with hope and determination.”</blockquote>
                    <div class="rating">
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-half">
                        <use xlink:href="#star-half"></use>
                      </svg>
                      <svg class="star star-empty">
                        <use xlink:href="#star-empty"></use>
                      </svg>
                    </div>
                    <div class="author-detail">
                      <div class="name text-dark text-uppercase pt-2">Supporters</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-icon swiper-arrow swiper-arrow-next position-absolute d-flex align-items-center">
              <svg class="chevron-right">
                <use xlink:href="#chevron-right" />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </section>
    
    @endsection