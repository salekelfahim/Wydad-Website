@extends('layouts.admin')

@section('content')

@if(session('success'))
<div style="width: 80%;" class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif

<main>
    <div class="welcome-page">
        <h2 class="welcome-message">Add New Event</h2>
        <p>You Can Add Your Event Here! Thank You.</p>
    </div>

    <form method="post" class="mx-auto" action="{{route ('addplayer')}}" enctype="multipart/form-data" style="width: 55%;">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" id="firstname" name="firstname" class="form-control">
                    @error('firstname')
                    <div class="alert alert-danger">- {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="form-control">
                    @error('lastname')
                    <div class="alert alert-danger">- {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="mb-3">
            <label for="firstname" class="form-label">Nationality</label>
            <input type="text" id="nationality" name="nationality" class="form-control">
            @error('firstname')
            <div class="alert alert-danger">- {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="form4Example3" class="form-label">Birthday</label>
            <input type="date" id="birthday" name="birthday" class="form-control">
            @error('date')
            <div class="alert alert-danger">- {{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Number</label>
                    <input type="number" id="number" name="number" class="form-control">
                    @error('firstname')
                    <div class="alert alert-danger">- {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <select id="position" name="position" class="form-select">
                        <option value="Goalkeeper">Goalkeeper</option>
                        <option value="Defender">Defender</option>
                        <option value="Midfielder">Midfielder</option>
                        <option value="Forward">Forward</option>
                    </select>
                </div>

            </div>
        </div>


        <div class="mb-3">
            <label for="form4Example3" class="form-label">Image</label>
            <input type="file" id="picture" name="picture" class="form-control" accept="image/*">
            @error('image')
            <div class="alert alert-danger">- {{ $message }}</div>
            @enderror
        </div>


        <button name="submit" type="submit" class="btn btn-dark float-end mt-3">Add Player</button>
    </form>
</main>

@endsection