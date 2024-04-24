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
                </div>
                <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
            </div>
        </div>
    </div>

    <div class="container overflow-hidden">
        <div id="search_result" class="row gy-4 gy-lg-0 gx-xxl-5">
            <div class="cardWrap">
                <div class="card cardLeft">
                    <h1>Startup <span>Cinema</span></h1>
                    <div class="title">
                        <h2>How I met your Mother</h2>
                        <span>movie</span>
                    </div>
                    <div class="name">
                        <h2>Vladimir Kudinov</h2>
                        <span>name</span>
                    </div>
                    <div class="seat">
                        <h2>156</h2>
                        <span>seat</span>
                    </div>
                    <div class="time">
                        <h2>12:00</h2>
                        <span>time</span>
                    </div>

                </div>
                <div class="card cardRight">
                    <div class="eye"></div>
                    <div class="number">
                        <h3>156</h3>
                        <span>seat</span>
                    </div>
                    <div class="barcode"></div>
                </div>

            </div>

        </div>
    </div>



</section>


<style>
    .cardWrap {
        width: 27em;
        margin: 3em auto;
        color: #fff;
        font-family: sans-serif;
    }

    .card {
        background: linear-gradient(to bottom, #e84c3d 0%, #e84c3d 26%, #ecedef 26%, #ecedef 100%);
        height: 11em;
        float: left;
        position: relative;
        padding: 1em;
        margin-top: 100px;
    }

    .cardLeft {
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        width: 16em;
    }

    .cardRight {
        width: 6.5em;
        border-left: .18em dashed #fff;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;

        &:before,
        &:after {
            content: "";
            position: absolute;
            display: block;
            width: .9em;
            height: .9em;
            background: #fff;
            border-radius: 50%;
            left: -.5em;
        }

        &:before {
            top: -.4em;
        }

        &:after {
            bottom: -.4em;
        }
    }

    h1 {
        font-size: 1.1em;
        margin-top: 0;

        span {
            font-weight: normal;
        }
    }

    .title,
    .name,
    .seat,
    .time {
        text-transform: uppercase;
        font-weight: normal;

        h2 {
            font-size: .9em;
            color: #525252;
            margin: 0;
        }

        span {
            font-size: .7em;
            color: #a2aeae;
        }
    }

    .title {
        margin: 2em 0 0 0;
    }

    .name,
    .seat {
        margin: .7em 0 0 0;
    }

    .time {
        margin: .7em 0 0 1em;
    }

    .seat,
    .time {
        float: left;
    }

    .eye {
        position: relative;
        width: 2em;
        height: 1.5em;
        background: #fff;
        margin: 0 auto;
        border-radius: 1em/0.6em;
        z-index: 1;

        &:before,
        &:after {
            content: "";
            display: block;
            position: absolute;
            border-radius: 50%;
        }

        &:before {
            width: 1em;
            height: 1em;
            background: red;
            z-index: 2;
            left: 8px;
            top: 4px;
        }

        &:after {
            width: .5em;
            height: .5em;
            background: #fff;
            z-index: 3;
            left: 12px;
            top: 8px;
        }
    }

    .number {
        text-align: center;
        text-transform: uppercase;

        h3 {
            color: red;
            margin: .9em 0 0 0;
            font-size: 2.5em;

        }

        span {
            display: block;
            color: #a2aeae;
        }
    }
</style>

@endsection