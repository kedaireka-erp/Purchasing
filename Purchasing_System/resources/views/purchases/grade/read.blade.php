<select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" id="Grade"
    name="grades_id" value="{{ old('grades_id') }}">
    <option selected disabled>-- Pilih Grade --</option>
    @foreach ($Grade as $gra)
        <option value="{{ $gra->id }}">{{ ucfirst($gra->tipe) }}
        </option>
    @endforeach
</select>

