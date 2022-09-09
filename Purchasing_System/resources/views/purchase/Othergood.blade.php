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
          <label for="tanggal_pengajuan" class="form-label font">Requester</label>
          <input type="date" class="form-control input-powder">
        </div>      
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label font">Alamat Kirim</label>
          <input type="text" class="form-control input-powder">
        </div>
      </div>
      </div>
  
      <div class="row">
          <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label font">Kebutuhan</label>
            <input type="text" class="form-control input-powder">
          </div>      
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label font">Outstanding Barang Belum Datang</label>
            <input type="text" class="form-control input-powder">
          </div>
        </div>
        </div>
  
  
        <div class="row">
          <div class="col-lg-6">
          <div class="mb-3">
            <label for="tanggal_pengajuan" class="form-label font">Tanggal Kedatangan</label>
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
              <label for="tanggal_pengajuan" class="form-label font">Status</label>
              <input type="text" class="form-control input-powder" placeholder="Outstanding">
          </div>      
      </div>
  
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="tanggal_pengajuan" class="form-label font">Attachments</label>
          <input type="file" class="form-control input-powder">
        </div> 
    </div>
</div>
    
  
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
              <label for="tanggal_pengajuan" class="form-label font">Note</label>
              <textarea type="text" class="form-control input-powder" placeholder="Tidak ada catatan" style="font-style:italic"></textarea>
            </div>
          </div> 
          <div class="col-lg-6">
            <div class="mb-3">
                <label for="Type" class="form-label font">Type</label>
          <select class="form-select" aria-label="Default select example">
            <option selected disabled>Pilih Type</option>
            <option value="1">Powder</option>
            <option value="2">Othergood</option>
          </select>
            </div>
          </div>
    </div>
    
        <button type="button" class="btn btn-primary submit-powder">Submit</button>
  </form>
  </div>
  </div> 
  </div>
@endsection