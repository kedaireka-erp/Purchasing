<select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" id="Supplier"
    name="suppliers_id" value="{{ old('suppliers_id') }}">
    <option selected disabled>-- Pilih Supplier --</option>
    @foreach ($Supplier as $sup)
        <option value="{{ $sup->id }}">{{ ucfirst($sup->vendor) }}
        </option>
    @endforeach
</select>
@error('suppliers_id')
    <span class="text-danger">{{ $message }}</span>
@enderror
