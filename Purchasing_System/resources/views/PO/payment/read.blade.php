{{-- <!-- Select2 CSS --> 
<link href="{{ asset('layout/select2.css') }}" rel="stylesheet" /> 
<!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
<select class="form-select input-rounded form-control wide mb-3" name="id_pembayaran" id="id_pembayaran">
    <option selected disabled>-- Pilih Tipe --</option>
    @foreach ($payment as $pemb)
        <option value="{{ $pemb->id }}">{{ $pemb->name_payment }}
        </option>
    @endforeach
</select>
{{-- <script>
    $(document).ready(function(){
        $("#id_pembayaran").select2();
    });
</script> --}}

