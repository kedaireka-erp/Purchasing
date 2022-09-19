@extends('layout.sidebar')

@section('judul-laman', 'Edit Master Prefix')

@section('Judul-content')
    <div class="title-page">
        Edit Prefix Satuan
    </div>
@endsection

@section('content')
    <section class="event-area section-gap-extra-bottom">
        <div class="container" id="boxshadow">

            <div class="container col-lg-10">
                <div id="title" style="margin-top: 50px">
                    <div class="title">
                        <br>
                        <h4 style="margin-top: 30px; text-align: center"> Edit Data Prefix </h4>
                        <hr>
                    </div>
                </div>
                <div id="form" style="margin-top: 20px margin-down:20px">
                    <form action="{{ route('prefix.prefixupdate', $prefix->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="prefix" class="form-label input-runded"> Nama Satuan </label>
                            <input type="text" class="form-control Background @error('prefix') is-invalid @enderror"
                                name="prefix" autofocus value="{{ old('prefix', $prefix->prefix) }}">
                            @error('prefix')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="divisi" class="form-label input-runded"> Unit </label>
                            <input type="text" class="form-control Background @error('divisi') is-invalid @enderror"
                                name="divisi" value="{{ old('divisi', $prefix->divisi) }}">
                            @error('divisi')
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
        </div>
    </section>

@endsection
