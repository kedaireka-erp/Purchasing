@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Request')

@section('Judul-content')
<div class="title-page">
    Tambah Request 
</div>
@endsection

@section('content')

<div class="container col-lg-10">
<div class="box">
<div class="navform"></div>
<div class="content">
    <form>
        <div class="row">
          <div class="col-lg-6">
      <div class="mb-3">
        <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
        <input type="date" class="form-control" >
      </div>      
    </div>
    <div class="col-lg-6">
      <div class="mb-3">
        <label for="divisi" class="form-label">Divisi</label>
        <input type="text" class="form-control">
      </div>
    </div>
    </div>
    <div class="row">
          <div class="col-lg-6">
      <div class="mb-3">
        <label for="tanggal_kedatangan" class="form-label">Tanggal Kebutuhan Barang Tiba</label>
        <input type="date" class="form-control">
      </div>      
    </div>
    <div class="col-lg-6">
      <div class="mb-3">
        <label for="requester" class="form-label">Project/Customer</label>
        <input type="text" class="form-control">
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
      <div class="mb-3">
        <label for="tanggal_pengajuan" class="form-label">Tanggal Kedatangan Barang</label>
        <input type="date" class="form-control">
      </div>      
    </div>
    <div class="col-lg-6">
      <div class="mb-3">
        <label for="tanggal_pengajuan" class="form-label">Approval</label>
        <input type="date" class="form-control">
      </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label">Requester</label>
          <input type="text" class="form-control">
        </div>      
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label">Kebutuhan</label>
          <input type="text" class="form-control">
        </div>
      </div>
      </div>


      <div class="row">
        <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label">warna</label>
          <input type="text" class="form-control">
        </div>      
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label">Kode Warna</label>
          <input type="text" class="form-control">
        </div>
      </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
    <div class="mb-3">
      <label for="kode_warna" class="form-label">Grade</label>
      <input type="text" class="form-control" id="kode_warna">
    </div>      
  </div>
  <div class="col-lg-6">
    <div class="mb-3">
      <label for="finish" class="form-label">Finish</label>
      <div class="row">
    <div class="col-lg-6">
       <input type="text" class="form-control" id="Interior">
    </div>
    <div class="col-lg-6">
        <input type="text" class="form-control" id="Matt">
    </div>
    </div>
  </div>
  </div>
  
  
  <div class="row">

    <div class="col-lg-5">
        <div class="mb-3">
        <label for="tanggal_pengajuan" class="form-label">Supplier</label>
        <input type="text" class="form-control" placeholder="AXALTA">
        </div>      
    </div>

    <div class="col-lg-7">
        <div class="row" >
            <div class="col-4">
                <label for="tanggal_pengajuan" class="form-label">Qty</label>
                <input type="text" class="form-control" placeholder="Kg">
            </div>
        
            <div class="col-4">
                <label for="tanggal_pengajuan" class="form-label" aria-placeholder="Kgs/s">m2</label>
                <input type="text" class="form-control" placeholder="m2">
            </div>
            
            <div class="col-4">
                <label for="tanggal_pengajuan" class="form-label">Estimasi</label>
                <input type="text" class="form-control" placeholder="Kgs/m2">
            </div>
        </div>
  </div>
</div>

<div class="row">
    <div class="col-lg-5">
    <div class="mb-3">
      <label for="tanggal_pengajuan" class="form-label">Outstanding Powder</label>
      <input type="text" class="form-control" placeholder="10">
    </div>      
  </div>
  <div class="col-lg-7">
    <div class="row">
        <div class="col-4">
            <label for="tanggal_pengajuan" class="form-label">Fresh Stock</label>
            <input type="text" class="form-control" placeholder="2">
        </div>
        
        <div class="col-4">
            <label for="tanggal_pengajuan" class="form-label" aria-placeholder="Kgs/s">Recycle Stock</label>
            <input type="text" class="form-control" placeholder="2">
        </div>
        
        <div class="col-4">
            <label for="tanggal_pengajuan" class="form-label">Alokasi Fresh</label>
            <input type="text" class="form-control" placeholder="2">
        </div>
    </div>
  </div>
</div>

  <div class="row">

    <div class="col-lg-6">
        <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label">Status</label>
            <input type="text" class="form-control" placeholder="Outstanding">
        </div>      
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label">Alokasi Outstanding</label>
            <input type="text" class="form-control" placeholder="10">
        </div>
    </div>
    
  </div>
  

  <div class="row">
    <div class="col-lg-6">
    <div class="mb-3">
      <label for="tanggal_pengajuan" class="form-label">Attachments</label>
      <input type="file" class="form-control" placeholder="Add attachments file (PDF, JPEG, JPG, PNG, DWG, Etch.)">
    </div>      
  </div>
  <div class="col-lg-6">
    <div class="mb-3">
      <label for="tanggal_pengajuan" class="form-label">Note</label>
      <textarea type="text" class="form-control" placeholder="Tidak ada catatan" style="font-style:italic"></textarea>
    </div>
  </div>
  </div>
      <button type="button" class="btn btn-primary">Submite</button>
    </div>
    </form>
</div>
</div> 
</div>
@endsection