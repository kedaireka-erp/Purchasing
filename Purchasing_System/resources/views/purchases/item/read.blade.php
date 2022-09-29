<select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example"
    name="addMoreInputFields[0][id_master_item]">
    <option selected disabled>-- Pilih Barang --</option>
    @foreach ($master_item as $item)
        <option value="{{ $item->id }}">{{ ucfirst($item->item_name) }}
        </option>
    @endforeach
</select>
