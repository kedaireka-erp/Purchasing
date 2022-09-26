@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Order')

@section('datatable')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">

@endsection
@section('title_content', 'Purchase Order')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Buat Purchase Order</a></li>
        </ol>
    </div>
@endsection
@section('content')


    <div class="tabs">
        <div class="tab-2">
            <label for="tab2-1" class="title-form">Powder</label>
            <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
            <div>
                @include('PO.formPowder')
            </div>
        </div>
        <div class="tab-2">
            <label for="tab2-2" class="title-form">Other Good</label>
            <input id="tab2-2" name="tabs-two" type="radio">
            <div>
                @include('PO.formGoods')

            </div>
        </div>
    </div>




    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script> --}}

@endsection
