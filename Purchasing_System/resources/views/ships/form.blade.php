<div class="mb-3">
    <label for="type" class="form-label"> Tipe Pengiriman </label>
    <input class="form-control Background " type="text" name="type" value="{{ $model->type }}" autofocus>
    @foreach ($errors->get('type') as $msg)
        <p class="text-danger">{{ $msg }}</p>
    @endforeach
</div>

<button class="btn btn-info" type="submit">Submit</button>
