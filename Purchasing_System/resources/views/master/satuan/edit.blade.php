@extends('layout.sidebar')

@section('judul-laman', 'Edit Master Satuan')

@section('Judul-content')
    <div class="title-page">
        Edit Master Satuan
    </div>
@endsection

@section('content')
<section class="event-area section-gap-extra-bottom">
    <div class="container" id="boxshadow">

    <div class="container col-lg-10">
        <div id="title" style="margin-top: 50px">
            <div class="title">
                <br>
                <h4 style="margin-top: 30px; text-align: center"> Edit Data Satuan </h4>
                <hr>
            </div>
        </div>
        <div id="form" style="margin-top: 20px margin-down:20px">
            <form action="{{ route('satuan.satuanupdate', $satuan->id) }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label input-runded"> Nama Satuan </label>
                    <input type="text" class="form-control Background @error('name') is-invalid @enderror" name="name" autofocus
                        value="{{ old('name', $satuan->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label input-runded"> Unit </label>
                    <input type="text" class="form-control Background @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit', $satuan->unit) }}">
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
    </div>
</section>

@endsection
