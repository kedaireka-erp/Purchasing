
{{-- <!-- Select2 CSS --> 
<link href="{{ asset('layout/select2.css') }}" rel="stylesheet" /> 
<!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
<x-style></x-style>
<select class="nice-select default-select form-control wide mb-3" name="id_supplier" id="id_supplier">
    <option selected disabled>-- Pilih Tipe --</option>
    @foreach ($supplier as $item)
        <option value="{{ $item->id }}">{{ $item->vendor }}</option>
    @endforeach
</select>
<x-script></x-script>
{{-- <script>
    $(document).ready(function(){
        $("#id_supplier").select2();
    });
</script> --}}

