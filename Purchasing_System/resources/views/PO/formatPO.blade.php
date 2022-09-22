@extends('layout.sidebar')

@section('judul-laman', 'View Purchasing Request')

@section('Judul-content')

    <div class="d-flex justify-content-between">
        <div class="title-page">
            View Purchasing Request
        </div>
        <a href="/approval" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

<style>
    .cardpo{
      width: 100%;
      margin: auto;
      background-color: white;
      padding: 15px;
    }
    img{
        width: 70px;
        height: 70px;
    }
    .box1{
        width: 100%;
        height: 40px;
        background-color: #cab9e7;
    
    }
    .txt{
        padding: 10px;
    }
    .card-comment{
        width: 90%;
        /* height: 40%; */
        border: 2px solid black;
        background-color: white;
        padding: 10px;
    }
    hr{
        background-color: black;
    }
    .table, .th, .td {
  border: 1px solid black;
  border-collapse: collapse;
}
  
    </style>

@section('content')

<div class="cardpo">
    <div class="d-flex justify-content-center" style="margin-top: 20px">
      <div class="d-flex">
        <div>
          <img src="{{ asset('images/logo_compagnie.png') }}">
        </div>
        <div class="d-flex align-items-center">
          <h3>PT ALLURE ALUMINIO</h3>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-5" style="margin-top: 15px">
 
                    <p>Jakarta,07/05/2022</p>
        </div>

        <div class="col-6" style="margin-top:-65px" >

            <table class="subhead_pr">
                <tr>
                    <td><h3 style="white-space: nowrap">PURCHASE REQUEST</h3></td>
                </tr>
                <br>
                <tr>
                    <td>Nomor PO</td>
                    <td>: PO-SLS-000</td>
                </tr>
                <br>
                <tr>
                    <td width="80px">Nomor PR</td>
                    <td>: PR-000</td>
                </tr>
                <br>
                <tr>
                    <td width="80px">Waktu Pengiriman</td>
                    <td>: 01/05/2021</td>
                </tr>
                <br>
                <tr>
                    <td width="80px">Pembayaran</td>
                    <td>: COD</td>
                </tr>
            </table>

        </div>
    </div>


<div class="box1" style="margin-top: 40px">
    <div class="row" >
        <div class="col-1"></div>
        <div class="col-5 txt" >
            <strong>Purchasing Form : </strong>
        </div>
        <div class="col-1"></div>
        <div class="col-5 txt">
            <strong >Ship To :</strong>
        </div>
    </div>

</div>

    <div class="row" style="margin-top: 15px">
        <div class="col-1"></div>
        <div class="col-5">
                    <table>
                        <tr>
                            <p style="font-weight: bold"> PT CANON </p>
                        </tr>
                        <tr>
                           <p> Jl. Galuh Mas Raya, Sukaharja,telukjambe Timur, Karawang,Jawa Barat 41361 </p> 
                        </tr>
                    </table>
        </div>
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr>
                    <p style="font-weight: bold">Head Office PT Allure Aluminio</p>
                </tr>
                <tr>
                   <p> Artha Gading Niaga B17, RT.18/RW.8,Klp. Gading Bar., Kec. Klp. Gading, Jakarta,Daerah Khusus Ibukota Jakarta 14239</p>
                </tr>
            </table>
        </div>
    </div>

    <div class="box1" style="margin-top: 40px">
        <div class="row" >
            <div class="col-1"></div>
            <div class="col-5 txt" >
            </div>
            <div class="col-1"></div>
            <div class="col-5 txt">
                <strong >Billing Address :</strong>
            </div>
        </div>
    
    </div>

    <div class="row" style="margin-top: 15px">
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr>
                   <p>Kepada Yth. <br>
                    Hadi Sudrajat Di tempat</p>
                   <br>
                   <p>Dengan Hormat, <br>
                    Bersama ini kami order material sebagai berikut:</p>
                </tr>
            </table>      
        </div>
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr>
                    <p style="font-weight: bold"> PT Allure Aluminio</p>
                </tr>
                <tr>
                   <p> Artha Gading Niaga B17, RT.18/RW.8,Klp. Gading Bar., Kec. Klp. Gading, Jakarta,Daerah Khusus Ibukota Jakarta 14239 </p> 
                </tr>
            </table>
        </div>
    </div>
  <br>
    <table class="table table-bordered" style="box-shadow: none">
        <thead>
          <tr style="background-color:#cab9e7;  text-align:center; font-weight:bold">
            <td>No.</td>
            <td>Deskripsi</td>
            <td>Quantity</td>
            <td>Satuan Barang</td>
          </tr>
        </thead>
        <tbody>
          <tr scope="row" style="text-align: center">
            <th  scope="col">1</th>
            <td  scope="col">Kamera DSLR</td>
            <td  scope="col">1</td>
            <td  scope="col">Unit</td>
          </tr>
          <tr>
            <th scope="row" style="text-align: center" >2</th>
            <td></td>
            <td></td>
            <td></td>
          </tr>v
        </tbody>
      </table>

      <div class="row" style="margin-top: 60px">
        {{-- <div class="col-1"></div> --}}
        <div class="col-6 border-dark">
            {{-- <div class="card-comment">
                <strong>Comments or Special Intructions</strong>
                <hr style="color: black">
                <p>Harap menyertakan invoice, kwitansi, faktur pajak,dan surat jalan atas nama PT ALLURE ALLUMINIO dengan alamat sesuai NPWP.</p>
            </div> --}}
            <table class="table  table-bordered border-dark" style="border-radius: none; box-shadow:none; border:1px solid black">
                
                  <tr scope="row">
                    <th  scope="col" class="th">Comments or Special Intructions</th>
                  </tr>
                  <tr>
                    <td scope="row" class="td">Harap menyertakan invoice, kwitansi, faktur pajak,
                        dan surat jalan atas nama PT ALLURE ALLUMINIO dengan alamat sesuai NPWP.
                        <br><br><br><br>
                    </td>
                  </tr>
        
              </table>

        </div>
        <div class="col-2"></div>
        <div class="col-4" style="margin-top: 50px">
            <p>Mengetahui,</p>
            <img src="{{ asset('images/ttd.png') }}" style="width:40%; height:40%">
            <p>Hadi sudrajat</p>
        </div>
    </div>
    
<hr style="color: black; height:2p; margin-top: 20px">
<p><span style="color: red">*</span>Note : melampirkan salinan Purchase Order (PO), surat jalan (asli), Invoice (asli), dan materai pada saat penagihan  - Materai Rp. 10,000 untuk transaksi diatas Rp. 5 juta</p>

</div>
<br>
@endsection
