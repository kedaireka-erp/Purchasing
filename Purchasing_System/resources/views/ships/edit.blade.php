@extends('layout.sidebar')

@section('judul-laman', 'Edit Master Ships')

@section('Judul-content')
    <div class="title-page">
        Edit Data Kebutuhan/Pengiriman
    </div>
@endsection

@section('content')


    <section class="event-area section-gap-extra-bottom">
        <div class="container" id="boxshadow">

            <div class="container col-lg-8 text-left">
                <div id="title" style="margin-top: 50px">
                    <div class="title">
                        <br>
                        <h4 align="center"> Edit Data Kebutuhan/Pengiriman </h4>
                    </div>
                </div>


                <div id="form" style="margin-top: 60px">
                    <form method="POST" action="{{ url('ships/' . $model->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        @include('ships.form')

                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
