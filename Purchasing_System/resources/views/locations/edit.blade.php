@extends('layout.sidebar')

@section('judul-laman', 'Edit Master Location')

@section('Judul-content')
    <div class="title-page">
        Edit Master Location
    </div>
@endsection

@section('content')
<section class="event-area section-gap-extra-bottom">
    <div class="container" id="boxshadow">

    <div class="container col-lg-6">
        <div id="title" style="margin-top: 50px">
            <div class="title">
                <br>
                <h4> Edit Data Location </h4>
            </div>
        </div>
        <div id="form" style="margin-top: 20px margin-down:20px">
            <form action="{{route('location.update', $locations->id)}}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="location_name" class="form-label">Location Name </label>
                    <input type="text" class="form-control Background @error('location_name') is-invalid @enderror" name="location_name" autofocus
                        value="{{$locations->location_name}}">
                        @error('location_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label"> Address </label>
                    <input type="text" class="form-control Background @error('address') is-invalid @enderror" name="address" value="{{$locations->address}}">
                    @error('address')
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
