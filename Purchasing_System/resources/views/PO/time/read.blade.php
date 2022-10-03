<div class="row">
    <div class="col-lg-9">
        <select class="form-select input-rounded form-control wide mb-3" name="id_waktu">
            <option selected disabled>-- Pilih Supplier --</option>
            @foreach ($time as $it)
                <option value="{{ $it->id }}">{{ $it->name_time }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-3">
        <a onClick="time_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPOCenter" style="width: 100%"
            class="input-rounded btn btn-primary"> <i class="fa fa-plus" style="font-size:14px"></i>
        </a>
    </div>
</div>

<button type="button" onclick="date_read()" class="btn btn-primary"> Input Tanggal </button>
