<select class="form-select input-rounded form-control wide mb-3" name="id_supplier" id="id_supplier">
    <option selected disabled>-- Pilih Tipe --</option>
    @foreach ($supplier as $item)
        <option value="{{ $item->id }}">{{ $item->vendor }}</option>
    @endforeach
</select>
