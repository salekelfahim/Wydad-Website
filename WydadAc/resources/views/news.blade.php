@extends('layouts.main')

@section('content')

<section class="ezy__blog4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="ezy__blog4-heading mb-3 mt-0">Heal the world with banking blog.</h2>
                <p class="ezy__blog4-sub-heading px-lg-5 mb-4">
                    Banking crises have developed many times throughout history when one or more risks have emerged.
                </p>
                <a href="" class="btn btn-warning ezy__blog4-btn">All Posts</a>
            </div>
        </div>

        <div class="row align-items-center mt-5">
            <div class="col-12 mb-4">
                <article class="ezy__blog4-featured-post">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <img src="{{ asset('storage/' . $news->picture) }}" alt="" class="img-fluid rounded-3" />
                        </div>
                        <div class="col-lg-5">
                            <div class="mt-4 mt-lg-0 ps-lg-4">
                                <h4 class="ezy__blog4-title mb-2">
                                    {{$news->title}}
                                </h4>
                                <p class="ezy__blog4-description mt-3 mb-4">
                                    {{$news->content}}
                                </p>
                                <div class="ezy__blog4-author d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 small opacity-75"> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Latest Posts</h2>
            <div class="btn-right">
              <a href="blog.html" class="btn btn-medium btn-normal text-uppercase">Read Blog</a>
            </div>
          </div>
            @foreach($newss as $news)
            <div class="col-12 col-md-6 col-lg-4">
                <article class="ezy__blog4-post rounded overflow-hidden mt-4 h-100">
                    <img src="{{ asset('storage/' . $news->picture) }}" alt="" class="img-fluid w-100" />
                    <div class="p-3 p-lg-4">
                        <h4 class="ezy__blog4-title fs-4 mb-1">{{$news->title}} </h4>
                        <p class="ezy__blog4-author">
                            <span><i class="far fa-clock me-1"></i> <span> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}
                                </span></span>
                        </p>
                        <a href="{{ route('news.details', $news->id ) }}" class="btn ezy__blog4-btn-read-more">Read More</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection