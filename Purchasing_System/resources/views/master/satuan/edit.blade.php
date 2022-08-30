@extends('layout.sidebar')

@section('judul-laman', 'Edit Master Satuan')

@section('Judul-content')
    <div class="title-page">
        Edit Master Satuan
    </div>
@endsection

@section('content')

    <div class="container col-lg-6"">
        <div id="title" style="margin-top: 50px">
            <div class="title">
                <h4> Edit Data Satuan </h4>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="form" style="margin-top: 50px">
            <form action="{{ route('satuan.satuanupdate', $satuan->id) }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label"> Nama Satuan </label>
                    <input type="text" class="form-control" name="name" autofocus
                        value="{{ old('name', $satuan->name) }}">
                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label"> Unit </label>
                    <input type="text" class="form-control" name="unit" value="{{ old('unit', $satuan->unit) }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

    </div>

@endsection
