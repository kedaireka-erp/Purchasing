<select class="form-select input-rounded form-control wide mb-3" name="id_pembayaran">
    <option selected disabled>-- Pilih Tipe --</option>
    @foreach ($payment as $pemb)
        <option value="{{ $pemb->id }}">{{ $pemb->name_payment }}
        </option>
    @endforeach
</select>
