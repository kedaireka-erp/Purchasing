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
    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            time_read();
            time_reader();
        });

        function time_read() {
            $.get("{{ url('order/create/time') }}", {}, function(data, status) {
                $("#read_time").html(data);
            });
        }

        function date_read() {
            $.get("{{ url('order/create/date') }}", {}, function(data, status) {
                $("#read_time").html(data);
            });
            date_reader();
        }

        function time_reader() {
            $.get("{{ url('order/create/time') }}", {}, function(data, status) {
                $("#reader_time").html(data);
            });
        }

        function date_reader() {
            $.get("{{ url('order/create/date') }}", {}, function(data, status) {
                $("#reader_time").html(data);
            });
        }


        function location_create() {
            $.get("{{ url('order/create/location') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Location');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }
    </script>

@endsection
