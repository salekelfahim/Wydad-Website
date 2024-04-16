@extends('layouts.admin')

@section('content')

<main>

    @if(session('success'))
    <div class="alert alert-success" id="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="welcome-page">
        <h2 class="welcome-message">Add New Product</h2>
        <p style="margin-top: 1%;">You Can Add New Product Here! </p>
    </div>

    <form method="post" class="mx-auto" action="{{ route ('addproduct')}}" enctype="multipart/form-data" style="width: 55%;">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                    @error('name')
                    <div class="alert alert-danger">- {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file" id="cover" name="cover" class="form-control" accept="image/*">
                    @error('cover')
                    <div class="alert alert-danger">- {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" id="price" name="price" class="form-control">
                    @error('price')
                    <div class="alert alert-danger">- {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" name="type" class="form-select">
                        @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->types}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="mb-3">
            <label for="firstname" class="form-label">Description</label>
            <textarea type="text" id="description" name="description" class="form-control"></textarea>
            @error('firstname')
            <div class="alert alert-danger">- {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="firstname" class="form-label">Details</label>
            <textarea type="text" id="details" name="details" class="form-control"></textarea>
            @error('firstname')
            <div class="alert alert-danger">- {{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            @foreach ($sizes as $size)
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">{{$size->size}} (Quantity):</label>
                    <input type="number" id="quantity" name="sizes[{{$size->id}}]" class="form-control">
                    @error('firstname')
                    <div class="alert alert-danger">- {{ $message }}</div>
                    @enderror
                </div>
            </div>
            @endforeach

        </div> 


        <div class="mb-3">
            <label for="form4Example3" class="form-label">Pictures</label>
            <input type="file" id="picture" name="pictures[]" class="form-control" accept="image/*" multiple="multiple">
            @error('picture')
            <div class="alert alert-danger">- {{ $message }}</div>
            @enderror
        </div>


        <button name="submit" type="submit" class="btn btn-dark float-end mt-3 mb-5">Add Product</button>
    </form>
</main>

<script>
document.getElementById('picture').addEventListener('change', function() {
    var input = this;
    var limit = 3;
    if (input.files.length !== 3) {
        alert('You must add 3 Images');
        input.value = '';
    }
});
</script>

@endsection