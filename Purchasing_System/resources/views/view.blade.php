@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Prefix')

@section('Judul-content')
    <div class="title-page">
        View Purchasing Request
    </div>
@endsection

@section('content')


    <div class="viewpr">
        <div id="header">
            <div class="row">
                <div class="col-4">
            <p>PT ALLURE ALUMINIO</p>
                </div>
                
                <div class="col-4"></div>
                
                <div class="col-4">
                    <span class="bold"> <strong> Purchase Request </strong> </span>
                    <p>No. PR/07092022/2022</p>
                    <br> <br>

                    <p>Date : 7 September 2022</p>
                    <p>Site : Site A</p>
                    <P>Page : Page 1/1</P>
                </div>
            </div>
            </div>

        <table class="table table-striped" id="body">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Item Code</th>
                <th scope="col">Description of Goods</th>
                <th scope="col">Unit</th>
                <th scope="col">Quantity</th>
                <th scope="col">Requuired Date</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>PR1</td>
                <td>Meja Makan</td>
                <td>Pcs</td>
                <td>2</td>
                <td>12/12/2022</td>
                <td>1000000</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>PR2</td>
                <td>Kulkas</td>
                <td>Pcs</td>
                <td>2</td>
                <td>31/12/2022</td>
                <td>3000000</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>PR3</td>
                <td>Laptop</td>
                <td>Pcs</td>
                <td>2</td>
                <td>12/10/2022</td>
                <td>17000000</td>
              </tr>
            </tbody>
          </table>

          <div class="row">
            <div class="col-6">
                <p>Prefered Vendor : Yogiana Marta</p>

            </div>
            <div class="col-6">

                <table class="table">
                    <thead>
                      <tr>
                       
                        <th scope="col">Registered By</th>
                        <th scope="col">Prepared By</th>
                        <th scope="col">Approved By</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                      </tr>
                      <tr>
                       
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                      </tr>
                      <tr>
                       
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                      </tr>
                    </tbody>
                  </table>

            </div>
       
          </div>

    </div>

@endsection