
@extends('layouts.main')

@section('content')

<section class="ezy__blog3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="welcome-page">
                <h2 class="mb-1 display-5 text-center">News</h2>
                <p>You Can See latest News About Our Team.</p>
            </div>
        </div>
        <div class="row mt-5">            @foreach($newss as $news)
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <article class="ezy__blog3-post h-100">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $news->picture) }}" alt="" class="img-fluid w-100" />
                        <div class="position-absolute top-0 start-0 px-4 py-3 fw-bold ezy__blog3-calendar">
                        {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}
                            <!-- 26<br />Oct<br />2016 -->
                        </div>
                    </div>
                    <div class="p-3 p-md-4">
                        <h4 class="mt-3 ezy__blog3-title fs-4">{{$news->title}} </h4>
                        <a href="card-title">
                            <a href="{{ route('news.details', $news->id ) }}" class="btn ezy__blog3-btn-read-more">Read More</a>
                    </div>
                </article>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection