<select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example"
    name="addMoreInputFields[0][id_satuan]">
    <option selected disabled>-- Pilih Satuan --</option>
    @foreach ($satuan as $sat)
        <option value="{{ $sat->id }}">{{ ucfirst($sat->unit) }}
        </option>
    @endforeach
</select>
