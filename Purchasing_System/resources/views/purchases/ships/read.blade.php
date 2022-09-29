<select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" id="Ship"
    name="ships_id" value="{{ old('ships_id') }}">
    <option selected disabled>--
        Pilih Kebutuhan/
        Pengiriman --</option>

    @foreach ($Ship as $ship)
        <option value="{{ $ship->id }}">{{ $ship->tipe }}</option>
    @endforeach
</select>
@error('ships_id')
    <span class="text-danger">{{ $message }}</span>
@enderror
