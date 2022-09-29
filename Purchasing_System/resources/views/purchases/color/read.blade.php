<select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" id="Grade"
    name="color_id" value="{{ old('color_id') }}">
    <option selected disabled>-- Pilih Kode Warna --</option>
    @foreach ($colour as $gra)
        <option value="{{ $gra->id }}">{{ ucfirst($gra->name) }}
        </option>
    @endforeach
</select>
@error('color_id')
    <span class="text-danger">{{ $message }}</span>
@enderror
