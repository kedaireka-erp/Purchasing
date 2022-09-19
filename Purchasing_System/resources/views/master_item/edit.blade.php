@extends('layout.sidebar')

@section('judul-laman', 'Edit Master Item')

@section('Judul-content')
    <div class="title-page">
        Edit Master Item
    </div>
@endsection

@section('content')
<section class="event-area section-gap-extra-bottom">
    <div class="container" id="boxshadow">

    <div class="container col-lg-10">
        <div id="title" style="margin-top: 50px">
            <div class="title">
                <br>
                <h4 style="margin-top: 30px; text-align: center"> Edit Data Item </h4>
                <hr>
            </div>
        </div>
        @foreach($items as $d)
        
        <div id="form" style="margin-top: 20px margin-down:20px">
            <form action="{{ url('masteritem/update') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id_master_item" value="{{ $d->id}}"> <br/>
                <div class="mb-3">
                    <label for="item_name" class="form-label input-runded"> Nama Item </label>
                    <input type="text" class="form-control Background @error('item_name') is-invalid @enderror" name="item_name" autofocus
                        value="{{ $d->item_name }}">
                        @error('item_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label input-runded"> Stock </label>
                    <input type="text" class="form-control Background @error('stock') is-invalid @enderror" name="stock" value="{{ $d->stock }}">
                    @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                @endforeach
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

    </div>
    </div>
</section>

@endsection
