<div class="mb-3">
    <input type="date" class="form-control input-rounded @error('tanggal_kirim') is-invalid @enderror"
        id="deadline_date" placeholder="-- INPUT --" name="tanggal_kirim" value="{{ old('deadline_date') }}">

    @error('tanggal_kirim')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<button type="button" onclick="time_read()" class="btn btn-primary"> Input Master Waktu </button>
