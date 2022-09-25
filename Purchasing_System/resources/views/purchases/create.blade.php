@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Request')

@section('Judul-content')
    <div class="title-page">
        Tambah Request
    </div>
@endsection

@section('datatable')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
        <div>
            @include('purchases.formGoods')
          
        </div>
      </div>
    </div>
    </div>
        </div>

    </div>


    
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
	

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<dr><div id="dynamicAddRemove" style="margin-top:6px"> <div class="row"> <div class="col-5">  <select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_master_item]"> <option selected disabled>-- Pilih Barang --</option> @foreach ($master_item as $item)<option value="{{ $item->id }}">{{ ucfirst($item->item_name) }}</option> @endforeach </select> </div><div class="col-2"> <input type="number" name="addMoreInputFields[' + i + '][stok]" placeholder="qty" class ="form-control input-rounded form-control-lg" / > </div><div class="col-3"><select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_satuan]"> <option selected disabled>-- Pilih Satuan --</option> @foreach ($satuan as $sat) <option value="{{ $sat->id }}">{{ ucfirst($sat->unit) }} </option> @endforeach </select></div><div class="col-2"><button type="button" class="btn btn-outline-danger remove-input-field" id="dynamic-ar">-</button></div><div></div></dr>'
            );
        });

        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('dr').remove();
        });

        $('#note').summernote({
        placeholder: '--INPUT--',
        tabsize: 2,
        height: 100
      });
      $('#note1').summernote({
        placeholder: '--INPUT--',
        tabsize: 2,
        height: 100
      });

    </script>
      
      <script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

      

@endsection
