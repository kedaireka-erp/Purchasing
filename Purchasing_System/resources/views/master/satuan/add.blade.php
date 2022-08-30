@extends('layout.sidebar')

@section('judul-laman', 'Tambah Master Satuan')

@section('Judul-content')
    <div class="title-page">
        Tambah Master Satuan
    </div>
@endsection

@section('content')

    <div class="container col-lg-6"">
        <div id="title" style="margin-top: 50px">
            <div class="title">
                <h4> Tambah Data Satuan </h4>
            </div>
        </div>


        <div id="form" style="margin-top: 50px">
            <form action="{{ route('satuan.satuanstore') }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label"> Nama Satuan </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label"> Unit </label>
                    <input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit"
                        value="{{ old('unit') }}">
                    @error('unit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

    </div>

@endsection
