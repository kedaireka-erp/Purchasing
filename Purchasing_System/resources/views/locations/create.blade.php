
        <div id="form" style="margin-top: 10px">
            <form action="{{route('location.store')}}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="location_name" class="form-label input-runded"> Nama Satuan </label>
                    <input type="text" class="form-control Background @error('location_name') is-invalid @enderror" name="location_name"
                        value="{{ old('location_name') }}" autofocus>
                    @error('location_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="address" class="form-label input-runded"> Address </label>
                    <input type="text" class="form-control Background @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address') }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    </div>