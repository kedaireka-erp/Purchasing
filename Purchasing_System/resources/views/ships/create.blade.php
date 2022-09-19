@extends('layout.sidebar')

@section('judul-laman', 'Tambah Master Ships')

@section('Judul-content')
    <div class="title-page">
        Tambah Data Kebutuhan/Pengiriman
    </div>
@endsection

@section('content')


    <section class="event-area section-gap-extra-bottom">
        <div class="container" id="boxshadow">

            <div class="container col-lg-10 text-left">
                <div id="title" style="margin-top: 70px">
                    <div class="title">
                        <br>
                        <h4 style="margin-top: 70px; text-align: center"> Tambah Data Kebutuhan/Pengiriman </h4>
                        <hr>
                    </div>
                </div>


                <div id="form" style="margin-top: 20px">
                    <form action="{{ url('ships') }}" method="post">
                        {{ csrf_field() }}
                        @include('ships.form')
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
