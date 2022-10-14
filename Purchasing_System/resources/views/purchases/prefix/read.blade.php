<select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example"
    aria-label="Default select example" id="Prefixe" name="prefixes_id" value="{{ old('prefixes_id') }}">
    <option selected disabled>-- Pilih Divisi --</option>
    @foreach ($Prefixe as $prefixe)
        <option value="{{ $prefixe->id }}">{{ $prefixe->divisi }}</option>
    @endforeach
</select>

