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
    {{-- <div id="tombol">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-2">
                    <form action="/" method="get">
                        <input class="form-control fa" name="search" type="search" placeholder="&#xf002      Search "
                            value="">
                    </form>
                </div>
                <div class="col-lg-4 col-md-2"></div>
                <div class="col-lg-3 col-md-4">
                    {{-- <div id="button_add">
                        <a href="/" class="btn btn-success" id="add"> +Add Data
                        </a>
                    </div> --}}

                {{-- </div>
            </div>
        </div>
    </div> --}} 

    {{-- <div class="container">
        <h1>Purchase Request</h1>
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                    placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
        <div class="col-12">
            <a href="{{ route('purchase_request.create') }}" class="btn btn-primary" type="submit">Add</a>
        </div> --}}
        <div class="card">
            <div id="chead">
                <div class="row">
                    <div class="col-9">
                        <div class="card-header">
                            <h4 class="card-title">Data Purchase Request Diterima</h4>
                        </div>
                    </div>
                    {{-- <div class="col-3">
                        <div id="button_add">
                              
                            <a href="{{ route('purchase_request.create') }}" class="btn btn-success" id="add"> +Buat PO
                            </a>
                        </div>
                    </div> --}}
    
    
                </div>
                <hr>
            </div>
    
    
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('order.orderstore') }}" method="post">
                  @csrf
            <table id="example3" class="display" style="width:100%">
                <thead>
                    <tr align="right">
                        {{-- <td align="center">
                                <div class="form-check custom-checkbox ms-2">
                                    <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </td> --}}
                            <td> Pilih </td>
                        <td align="left">Nomor PR</td>
                        <td>Deadline Date</td>
                        <td>Nama Barang</td>
                        <td>Quantity</td>
                        <td>Unit</td>
                        <td>Requester</td>
                        <td>Divisi</td>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($items as $no => $item)
                        <tr align="right">
                            <td align="center">
                                
                                    <input type="checkbox" name="ids[{{ $item->id }}]" value="{{ $item->id }}" class="form-check-input" id="customCheckBox2">
                                
                            </td>
                            <td class="content-control" align="left">{{ $item->no_pr }}</td>
                            <td class="content-control" align="left">{{ $item->deadline_date }}</td>
                            <td class="content-control" align="left">{{ $item->item_name }}</td>
                            <td class="content-control" align="left">{{ $item->stok }}</td>
                            <td class="content-control" align="left">{{ $item->name }}</td>
                            <td class="content-control" align="left">{{ $item->requester }}</td>
                            <td class="content-control" align="left">{{ $item->divisi }}</td>
                            {{-- <td class="content-control" align="left">{{ $item->purchase->get(0)->deadline_date }}</td> --}}
                            {{-- <td class="content-control" align="left">{{ $item->id_master_item }}</td>
                            <td class="content-control" align="left">{{ $item->stok }}</td>
                            <td class="content-control" align="left">{{ $item->outstanding }}</td> --}}
                        </tr>
                        @endforeach
                </tbody>
            </table>
           
        </div>
    </div>

        </div>
        </div>
        

        <div class="container col-lg-10">
            <div class="box">
             <div class="navForm"></div>
            <div class="content">
            
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="tanggal_pengajuan" class="form-label font">Supplier</label>
                      <input type="text" class="form-control input-powder" name="supplier">
                    </div>      
                  </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="divisi" class="form-label font">Atas Nama</label>
                    <input type="text" class="form-control input-powder" placeholder="Atas Nama" name="nama_supplier">
                  </div>
                </div>
                </div>
            
            
                {{-- <div class="row">
                      <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="tanggal_kedatangan" class="form-label font">ID Pengiriman</label>
                    <input type="text" class="form-control input-powder" name="id_waktu">
                  </div>      
                </div> --}}

                <div class="row">
                  <div class="col-lg-6">
                        <div class="mb-3">
                        <label for="nama_barang" class="form-label">Waktu Pengiriman</label>
                        <select class="form-select input-rounded" name="id_waktu">
                        <option selected disabled>-- Pilih Waktu Pengiriman --</option>
                        @foreach ($time as $it)
                              <option value="{{ $it->id }}">{{ $it->name }}
                              </option>
                        @endforeach
                        </select>
                        </div>
                  </div>

                  <div class="col-lg-6">
                        <div class="mb-3">
                        <label for="id_pembayaran" class="form-label">Pembayaran</label>
                        <select class="form-select input-rounded" name="id_pembayaran">
                        <option selected disabled>-- Pilih Pembayaran --</option>
                        @foreach ($payment as $pemb)
                              <option value="{{ $pemb->id }}">{{ $pemb->name }}
                              </option>
                        @endforeach
                        </select>
                        </div>
                  </div>
               
                </div>
            
            
                <div class="row">
                  <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="tanggal_pengajuan" class="form-label font">Alamat Penagihan</label>
                    <input type="textarea" class="form-control input-powder" name="alamat_penagihan">
                  </div>      
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="tanggal_pengajuan" class="form-label font">Lain-Lain</label>
                    <input type="textarea" class="form-control input-powder" name="lain-lain">
                  </div>
                </div>
                </div>
            
        
                <div class="mb-3">
                    <label for="note" class="form-label font">Note</label>
                    <textarea rows="4" cols="50" class="form-control input-powder" id="note" placeholder="-- INPUT --"
                        name="note"></textarea>
        
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="tanggal_pengajuan" class="form-label font">TTD</label>
                      <input type="file" class="form-control input-powder" name="signature">
                    </div>      
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="tanggal_pengajuan" class="form-label font">Nama Terang</label>
                      <input type="text" class="form-control input-powder" name="nama">
                    </div>
                  </div>
                  </div>
            

                  <input type="submit" class="btn btn-primary submit-powder" value="Submit">
            </form>
            
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
