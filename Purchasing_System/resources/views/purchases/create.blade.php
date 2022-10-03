@extends('layout.sidebar')

@section('judul-laman', 'Create Purchase Request')

@section('Judul-content')
    <div class="title-page">
        Tambah Request
    </div>
@endsection

@section('datatable')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)"> Add Data</a></li>
        </ol>
    </div>
@endsection

@section('content')


    <div class="card">
        <div id="chead">
            <div class="card-body">
                <div class="container">
                    <div class="tabs">
                        <div class="tab-2">
                            <label for="tab2-1" class="title-form">Powder</label>
                            <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
                            <div>
                                @include('purchases.formPowder')
                            </div>
                        </div>
                        <div class="tab-2">
                            <label for="tab2-2" class="title-form">Other Good</label>
                            <input id="tab2-2" name="tabs-two" type="radio">
                            <div disabled="disabled">
                                <form action="{{ route('purchase_request.storegood') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="type" class="form-label font">Type<span
                                                        style="color:red">*</span></label>
                                                <input readonly name="type" id="type"
                                                    class="form-control input-rounded form-control" value="othergood"
                                                    selected>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="deadline_date" class="form-label">Tanggal
                                                    Kebutuhan Barang<span style="color:red">*</span></label>
                                                <input type="date"
                                                    class="form-control input-rounded @error('deadline_date') is-invalid @enderror"
                                                    id="deadline_date" placeholder="-- INPUT --" name="deadline_date"
                                                    value="{{ old('deadline_date') }}">

                                                @error('deadline_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="requester" class="form-label">Requester<span
                                                        style="color:red">*</span></label>
                                                <input type="text"
                                                    class="form-control input-rounded @error('requester') is-invalid @enderror"
                                                    id="requester" placeholder="-- INPUT --" name="requester"
                                                    value="{{ old('requester') }}" autofocus>

                                                @error('requester')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="prefixes_id" class="form-label">Divisi<span
                                                        style="color:red">*</span></label>
                                                <div class="row">
                                                    <div class="col-lg-10 col-md-9 col-sm-2">
                                                        <div id="read_prefix"></div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-sm-2">
                                                        <a onClick="prefix_create()" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalPowderCenter" style="width: 100%"
                                                            class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                                style="font-size:14px"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="project" class="form-label">Project/Customer</label>
                                                <input type="text"
                                                    class="form-control input-rounded @error('project') is-invalid @enderror"
                                                    id="project" placeholder="-- INPUT --" name="project"
                                                    value="{{ old('project') }}">

                                                @error('project')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="Location">Lokasi<span style="color:red">*</span></label>
                                                <div class="row">
                                                    <div class="col-lg-10 col-md-9 col-sm-2">
                                                        <div id="read_location"></div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-sm-2">
                                                        <a onClick="location_create()" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalPowderCenter" style="width: 100%"
                                                            class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                                style="font-size:14px"></i>
                                                        </a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="Ship">Kebutuhan/ Pengiriman<span
                                                        style="color:red">*</span></label>
                                                <div class="row">
                                                    <div class="col-lg-10 col-md-9 col-sm-2">
                                                        <div id="read_ships"></div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-sm-2">
                                                        <a onClick="ships_create()" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalPowderCenter" style="width: 100%"
                                                            class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                                style="font-size:14px"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">

                                                <div class="basic-form custom_file_input">

                                                    <label for="attachment" class="form-label">Attachment</label>
                                                    <div class="input-group input-group-lg">
                                                        <span class="input-group-text">Upload</span>
                                                        <div class="form-file">
                                                            <input type="file"
                                                                class="form-file-input form-control input-rounded @error('attachment') is-invalid @enderror"
                                                                id="attachment" placeholder="Attachment"
                                                                name="attachment">
                                                        </div>
                                                    </div>


                                                </div>


                                                @error('attachment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" style="background-color:#cab9e7">
                                            <strong> Tambah barang </strong>
                                        </div>
                                        <div class="card-body" style="background-color: #f7f4f4">


                                            <div id="dynamicAddRemove">

                                                <div class="row">

                                                    <div class="col-lg-5">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>

                                                        <div class="row">
                                                            <div class="col-lg-9 col-md-8 col-sm-2">
                                                                <div id="reader_item"></div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4 col-sm-2">
                                                                <a onClick="item_create()" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalPowderCenter"
                                                                    style="width: 100%"
                                                                    class="input-rounded btn btn-primary"> <i
                                                                        class="fa fa-plus" style="font-size:14px"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <label for="quantity" class="form-label">Quantity</label>
                                                        <input type="number" name="addMoreInputFields[0][stok]"
                                                            placeholder="qty"
                                                            class="form-control input-rounded form-control-lg" />
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="satuan" class="form-label">Satuan</label>

                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-8 col-sm-2">
                                                                <div id="reader_unit"></div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-2">
                                                                <a onClick="unit_create()" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalPowderCenter"
                                                                    style="width: 100%"
                                                                    class="input-rounded btn btn-primary"> <i
                                                                        class="fa fa-plus" style="font-size:14px"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-1 col">
                                                        <label for="quantity" class="form-label">Aksi</label>
                                                        <button type="button" name="add" id="dynamic-ar"
                                                            class="btn btn-outline-primary">+</button>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                    {{-- Start --}}

                                    {{-- End --}}
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note</label>
                                        <textarea class="form-control input-rounded" id="note1" placeholder="-- INPUT --" name="note"
                                            value="{{ old('note') }}"></textarea>

                                    </div>


                                    <button class="btn btn-primary" type="submit"
                                        style="margin-top:20px">Submit</button>


                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="exampleModalPowderCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" align="center" id="PowderModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="powder_page" class="pd-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>




    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
    var i = 0;
$("#dynamic-ar").click(function () {
      ++i;
      $("#dynamicAddRemove").append(
            '<dr><div id = "dynamicAddRemove" style = "margin-top:6px"><div class="row"><div class="col-lg-5"><div class="row"><div class="col-lg-9 col-md-8"><select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_master_item]"><option selected disabled>-- Pilih Barang --</option>@foreach($master_item as $item)<option value="{{ $item->id }}">{{ ucfirst($item-> item_name) }}</option>@endforeach</select></div><div class="col-lg-3 col-md-4"></div></div></div><div class="col-lg-2"><input type="number" name="addMoreInputFields[' + i + '][stok]" placeholder="qty" class="form-control input-rounded form-control-lg" /></div><div class="col-lg-4"><div class="row"><div class="col-lg-8 col-md-8"><select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_satuan]"><option selected disabled>-- Pilih Satuan --</option> @foreach ($satuan as $sat) <option value="{{ $sat->id }}">{{ ucfirst($sat-> unit) }} </option> @endforeach </select></div><div class="col-lg-4 col-md-4"></div></div></div><div class="col-lg-1"><button type="button" class="btn btn-outline-danger remove-input-field" id="dynamic-ar">-</button></div><div></div></dr>'
      );
});

$(document).on('click', '.remove-input-field', function () {
      $(this).parents('dr').remove();
});
    </script>
    <script src="{{ asset('layout/ckeditor.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            prefix_read();
            location_read();
            ships_read();
            item_read();
            unit_read();
            color_read();
            supplier_read();
            grade_read();
            prefix_reader();
            location_reader();
            ships_reader();
            color_reader();
            supplier_reader();
            grade_reader();
        });

        function location_read() {
            $.get("{{ url('purchase_request/create/location/read') }}", {}, function(data, status) {
                $("#reader_location").html(data);
            });
        }

        function location_create() {
            $.get("{{ url('purchase_request/create/location') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Location');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function supplier_read() {
            $.get("{{ url('purchase_request/create/supplier/read') }}", {}, function(data, status) {
                $("#reader_supplier").html(data);
            });
        }

        function supplier_create() {
            $.get("{{ url('purchase_request/create/supplier') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Supplier');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }


        function color_read() {
            $.get("{{ url('purchase_request/create/color/read') }}", {}, function(data, status) {
                $("#reader_color").html(data);
            });
        }

        function color_create() {
            $.get("{{ url('purchase_request/create/color') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Color');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function prefix_read() {
            $.get("{{ url('purchase_request/create/prefix/read') }}", {}, function(data, status) {
                $("#reader_prefix").html(data);
            });
        }

        function prefix_create() {
            $.get("{{ url('purchase_request/create/prefix') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Prefix');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function grade_read() {
            $.get("{{ url('purchase_request/create/grade/read') }}", {}, function(data, status) {
                $("#reader_grade").html(data);
            });
        }

        function grade_create() {
            $.get("{{ url('purchase_request/create/grade') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Grade');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function ships_read() {
            $.get("{{ url('purchase_request/create/ships/read') }}", {}, function(data, status) {
                $("#reader_ships").html(data);
            });
        }

        function ships_create() {
            $.get("{{ url('purchase_request/create/ships') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Kebutuhan');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function item_read() {
            $.get("{{ url('purchase_request/create/item/read') }}", {}, function(data, status) {
                $("#reader_item").html(data);
            });
        }

        function item_create() {
            $.get("{{ url('purchase_request/create/item') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Item');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function unit_read() {
            $.get("{{ url('purchase_request/create/unit/read') }}", {}, function(data, status) {
                $("#reader_unit").html(data);
            });
        }

        function unit_create() {
            $.get("{{ url('purchase_request/create/unit') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Unit');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function location_reader() {
            $.get("{{ url('purchase_request/create/location/read') }}", {}, function(data, status) {
                $("#read_location").html(data);
            });
        }



        function supplier_reader() {
            $.get("{{ url('purchase_request/create/supplier/read') }}", {}, function(data, status) {
                $("#read_supplier").html(data);
            });
        }




        function prefix_reader() {
            $.get("{{ url('purchase_request/create/prefix/read') }}", {}, function(data, status) {
                $("#read_prefix").html(data);
            });
        }



        function ships_reader() {
            $.get("{{ url('purchase_request/create/ships/read') }}", {}, function(data, status) {
                $("#read_ships").html(data);
            });
        }
    </script>
@endsection
