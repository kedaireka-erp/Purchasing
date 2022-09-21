@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Sistem Purchasing')

@section('Judul-content')
    <div class="title-page">
        Form Purchase Order
    </div>
@endsection

@section('content')

<div class="container col-lg-10">
    <div class="box">
     <div class="navForm"></div>
    <div class="content">
    <form action="{{ route('order.orderstore') }}" method="post">
      @csrf
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
    
    
        <div class="row">
              <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_kedatangan" class="form-label font">ID Pengiriman</label>
            <input type="text" class="form-control input-powder" name="id_waktu">
          </div>      
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_kedatangan" class="form-label font">ID Pembayaran</label>
            <input type="text" class="form-control input-powder" name="id_pembayaran">
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
          <label for="tanggal_pengajuan" class="form-label font">ID Item</label>
          <input type="textarea" class="form-control input-powder" name="id_order">
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
    

          <button type="submit" class="btn btn-primary submit-powder">Submit</button>
    </form>
    </div>
    </div> 
    </div>

@endsection
