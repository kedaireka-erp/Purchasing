<select class="default-select input-rounded form-control wide mb-3" id="Location" name="locations_id"
    value="{{ old('locations_id') }}">
    <option selected disabled>-- Pilih Lokasi
        Pengiriman --</option>
    @foreach ($Location as $item)
        <option value="{{ $item->id }}">{{ ucfirst($item->location_name) }}
        </option>
    @endforeach
</select>

