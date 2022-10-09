<!-- Select2 CSS --> 
<link href="{{ asset('layout/select2.css') }}" rel="stylesheet" /> 
<!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<div class="row">
    <div class="col-lg-9">
        <select class="form-select input-rounded form-control wide mb-3" name="id_waktu" id="id_waktu">
            <option selected disabled>-- Pilih Supplier --</option>
            @foreach ($time as $it)
                <option value="{{ $it->id }}">{{ $it->name_time }}
                </option>
            @endforeach
        </select>
        <script>
            $(document).ready(function(){
                $("#id_waktu").select2();
            });
        </script>

    </div>
    <div class="col-lg-3">
        <a onClick="time_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPOCenter" style="width: 100%"
            class="input-rounded btn btn-primary"> <i class="fa fa-plus" style="font-size:14px"></i>
        </a>
    </div>
</div>

<button type="button" onclick="date_read()" class="btn btn-primary"> Input Tanggal </button>

