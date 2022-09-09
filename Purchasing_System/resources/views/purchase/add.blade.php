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
    <ul class="ul-powder">
      <li class="li-powder"><a class="active a-powder" href="/add">POWDER</a></li>
      <li class="li-powder"><a class="a-powder" href="#news">OTHER GOOD</a></li>
    </ul>
  <div class="content">
  <form>
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label font">Tanggal Pengajuan</label>
            <input type="date" class="form-control input-powder" >
          </div>      
        </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="divisi" class="form-label font">Divisi</label>
          <input type="text" class="form-control input-powder" placeholder="Sales">
        </div>
      </div>
      </div>
  
  
      <div class="row">
            <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_kedatangan" class="form-label font">Tanggal Kebutuhan Barang Tiba</label>
          <input type="date" class="form-control input-powder">
        </div>      
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="requester" class="form-label font">Project/Customer</label>
          <input type="text" class="form-control input-powder">
        </div>
      </div>
      </div>
  
  
      <div class="row">
        <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label font">Tanggal Kedatangan Barang</label>
          <input type="date" class="form-control input-powder">
        </div>      
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label font">Approval</label>
          <input type="date" class="form-control input-powder">
        </div>
      </div>
      </div>
  
      <div class="row">
          <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label font">Requester</label>
            <input type="text" class="form-control input-powder">
          </div>      
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label font">Kebutuhan</label>
            <input type="text" class="form-control input-powder">
          </div>
        </div>
        </div>
  
  
        <div class="row">
          <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label font">warna</label>
            <input type="text" class="form-control input-powder">
          </div>      
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label font">Kode Warna</label>
            <input type="text" class="form-control input-powder">
          </div>
        </div>
        </div>
  
        <div class="row">
          <div class="col-lg-6">
      <div class="mb-3">
        <label for="kode_warna" class="form-label font">Grade</label>
        <input type="text" class="form-control input-powder">
      </div>      
    </div>
    <div class="col-lg-6">
      <div class="mb-3">
        <label for="finish" class="form-label font">Finish</label>
        <div class="row">
      <div class="col-lg-6">
         <input type="text" class="form-control input-powder" >
      </div>
      <div class="col-lg-6">
          <input type="text" class="form-control input-powder" >
      </div>
      </div>
    </div>
    </div>
    
    
    <div class="row">
      <div class="col-lg-5">
          <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label font">Supplier</label>
          <input type="text" class="form-control input-powder" placeholder="AXALTA">
          </div>      
      </div>
      <div class="col-lg-7">
          <div class="row" >
              <div class="col-4">
                  <label for="tanggal_pengajuan" class="form-label font">Qty</label>
                  <input type="text" class="form-control input-powder" placeholder="Kg">
              </div>
              <div class="col-4">
                  <label for="tanggal_pengajuan" class="form-label font" >m2</label>
                  <input type="text" class="form-control input-powder" placeholder="m2">
              </div>
              <div class="col-4">
                  <label for="tanggal_pengajuan" class="form-label font">Estimasi</label>
                  <input type="text" class="form-control input-powder" placeholder="Kgs/m2">
              </div>
          </div>
    </div>
  </div>
  
  <div class="row">
      <div class="col-lg-5">
      <div class="mb-3">
        <label for="tanggal_pengajuan" class="form-label font">Outstanding Powder</label>
        <input type="text" class="form-control input-powder" placeholder="10">
      </div>      
    </div>
    <div class="col-lg-7">
      <div class="row">
          <div class="col-4">
              <label for="tanggal_pengajuan" class="form-label font">Fresh Stock</label>
              <input type="text" class="form-control input-powder" placeholder="2">
          </div>
          
          <div class="col-4">
              <label for="tanggal_pengajuan" class="form-label font">Recycle Stock</label>
              <input type="text" class="form-control input-powder" placeholder="2">
          </div>
          
          <div class="col-4">
              <label for="tanggal_pengajuan" class="form-label font">Alokasi Fresh</label>
              <input type="text" class="form-control input-powder" placeholder="2">
          </div>
      </div>
    </div>
  </div>
  
    <div class="row">
      <div class="col-lg-6">
          <div class="mb-3">
              <label for="tanggal_pengajuan" class="form-label font">Status</label>
              <input type="text" class="form-control input-powder" placeholder="Outstanding">
          </div>      
      </div>
  
      <div class="col-lg-6">
          <div class="mb-3">
              <label for="tanggal_pengajuan" class="form-label font">Alokasi Outstanding</label>
              <input type="text" class="form-control input-powder" placeholder="10">
          </div>
      </div>
    </div>
    
  
    <div class="row">
      <div class="col-lg-6">
      <div class="mb-3">
        <label for="tanggal_pengajuan" class="form-label font">Attachments</label>
        <input type="file" class="form-control input-powder">
      </div>      
    </div>
    <div class="col-lg-6">
      <div class="mb-3">
        <label for="tanggal_pengajuan" class="form-label font">Note</label>
        <textarea type="text" class="form-control input-powder" placeholder="Tidak ada catatan" style="font-style:italic"></textarea>
      </div>
    </div>
    </div>
        <button type="button" class="btn btn-primary submit-powder">Submite</button>
  </form>
  </div>
  </div> 
  </div>
@endsection