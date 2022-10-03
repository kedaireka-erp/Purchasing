<select class="form-select input-rounded form-control wide mb-3" name="id_alamat_kirim"
    value="{{ old('id_alamat_kirim') }}">
    <option selected disabled>-- Pilih Tipe --</option>
    @foreach ($location as $item)
        <option value="{{ $item->id }}">{{ ucfirst($item->location_name) }}
        </option>
    @endforeach
</select>
