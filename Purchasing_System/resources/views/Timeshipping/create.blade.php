{{-- @extends('layout.sidebar')

@section('judul-laman', 'Tambah Master Timeshipping')

@section('Judul-content')
    <div class="title-page">
        Tambah Master Timeshipping
    </div>
@endsection

@section('content')
<section class="event-area section-gap-extra-bottom">
    <div class="container" id="boxshadow">

    <div class="container col-lg-10 col text-left"  >
        <div id="title" style="margin-top: 50px">
            <div class="title">
                <br>
                <h4 style="margin-top: 70px; text-align: center"> Tambah Data Timeshipping </h4>
                <hr>
            </div>
        </div>
 --}}

<div id="form" style="margin-top: 10px">
    <form method="POST" action="{{ route('timeshipping.store') }}">
        @csrf
        <div>
            <label class="form-label">Supplier Type</label>
            <input type="text" name="name_time" class="form-control" placeholder="Input Time Shipping"
                value="{{ $timeshipping->name }}">
            @foreach ($errors->get('name') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div> <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </div>
        </div>

    </div>
    
</section>
@endsection --}}
