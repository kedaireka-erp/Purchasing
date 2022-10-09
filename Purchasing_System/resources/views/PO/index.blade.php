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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

    <div class="modal fade" id="exampleModalPOCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" align="center" id="POModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div id="PO_page" class="pd-2"></div>
                </div>
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
            supplier_reader();
            supplier_read();
            payment_reader();
            payment_read();
            time_reader();
            time_read();
            location_read();
            location_reader();
        });

        function time_read() {
            $.get("{{ url('order/read/time') }}", {}, function(data, status) {
                $("#read_time").html(data);
            });
            time_reader();
        }

        function date_read() {
            $.get("{{ url('order/create/date') }}", {}, function(data, status) {
                $("#read_time").html(data);
            });
            date_reader();
        }

        function time_reader() {
            $.get("{{ url('order/read/time') }}", {}, function(data, status) {
                $("#reader_time").html(data);
            });
        }

        function date_reader() {
            $.get("{{ url('order/create/date') }}", {}, function(data, status) {
                $("#reader_time").html(data);
            });
        }

        function supplier_read() {
            $.get("{{ url('order/read/supplier') }}", {}, function(data, status) {
                $("#read_supplier_po").html(data);
            });
        }

        function supplier_reader() {
            $.get("{{ url('order/read/supplier') }}", {}, function(data, status) {
                $("#reader_supplier_po").html(data);
            });
        }

        function time_create() {
            $.get("{{ url('order/create/time') }}", {}, function(data, status) {
                $("#POModalLabel").html('Add Supplier');
                $("#PO_page").html(data);
                $("#exampleModalPOCenter").modal('show');

            })
        }

        function supplier_po_create() {
            $.get("{{ url('order/create/supplier') }}", {}, function(data, status) {
                $("#POModalLabel").html('Add Supplier');
                $("#PO_page").html(data);
                $("#exampleModalPOCenter").modal('show');

            })
        }

        function location_read() {
            $.get("{{ url('order/read/location') }}", {}, function(data, status) {
                $("#read_location_po").html(data);
            });
        }

        function location_reader() {
            $.get("{{ url('order/read/location') }}", {}, function(data, status) {
                $("#reader_location_po").html(data);
            });
        }

        function location_po_create() {
            $.get("{{ url('order/create/location') }}", {}, function(data, status) {
                $("#POModalLabel").html('Add Location');
                $("#PO_page").html(data);
                $("#exampleModalPOCenter").modal('show');

            })
        }

        function payment_read() {
            $.get("{{ url('order/read/payment') }}", {}, function(data, status) {
                $("#read_payment_po").html(data);
            });
        }

        function payment_reader() {
            $.get("{{ url('order/read/payment') }}", {}, function(data, status) {
                $("#reader_payment_po").html(data);
            });
        }

        function payment_po_create() {
            $.get("{{ url('order/create/payment') }}", {}, function(data, status) {
                $("#POModalLabel").html('Add Payment');
                $("#PO_page").html(data);
                $("#exampleModalPOCenter").modal('show');

            })
        }
    </script>

@endsection
