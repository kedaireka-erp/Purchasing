{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container"> <br>
    <form method="POST" action="{{ route('grade.store') }}">
    @csrf
        <div>
            <label class="form-label">Grade Type</label>
            <input type="text" name="type" class="form-control" placeholder="Input Grade Type" value="{{ $grade->type }}">
            @foreach ($errors->get('type') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div> <br>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> --}}


@extends('layout.sidebar')

@section('judul-laman', 'Tambah Master Grade')

@section('Judul-content')
    <div class="title-page">
        Tambah Master Grade
    </div>
@endsection

@section('content')
<section class="event-area section-gap-extra-bottom">
    <div class="container" id="boxshadow">

    <div class="container col-lg-10 col text-left"  >
        <div id="title" style="margin-top: 50px">
            <div class="title">
                <br>
                <h4 style="margin-top: 70px; text-align: center"> Tambah Data Grade </h4>
                <hr>
            </div>
        </div>


        <div id="form" style="margin-top: 10px">
            <form action="{{ route('grade.store') }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label input-runded"> Grade Type</label>
                    <input type="text" class="form-control Background @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </div>

    </div>
</section>
@endsection
