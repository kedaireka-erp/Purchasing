{{-- @extends('layout.sidebar')

@section('judul-laman', 'Tambah Master Prefix')

@section('Judul-content')
    <div class="title-page">
        Tambah Master Prefix
    </div>
@endsection

@section('content')
    <section class="event-area section-gap-extra-bottom">
        <div class="container" id="boxshadow">

            <div class="container col-lg-10 col text-left">
                <div id="title" style="margin-top: 50px">
                    <div class="title">
                        <br>
                        <h4 style="margin-top: 30px; text-align: center"> Tambah Data Prefix </h4>
                        <hr>
                    </div>
                </div>
 --}}

                <div id="form" style="margin-top: 10px">
                    <form action="{{ route('prefix.prefixstore') }}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="prefix" class="form-label input-runded"> Nama Prefix </label>
                            <input type="text" class="form-control Background @error('prefix') is-invalid @enderror"
                                name="prefix" value="{{ old('prefix') }}" autofocus>
                            @error('prefix')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="divisi" class="form-label input-runded"> Divisi </label>
                            <input type="text" class="form-control Background @error('divisi') is-invalid @enderror"
                                name="divisi" value="{{ old('divisi') }}">
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
            {{-- </div>

        </div>
    </section>
@endsection --}}
