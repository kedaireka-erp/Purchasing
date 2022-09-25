
                <div class="mb-3">
                    <label for="location_name" class="form-label input-runded">Location Name </label>
                    <input disabled type="text" class="form-control Background @error('location_name') is-invalid @enderror" name="location_name" autofocus
                        value="{{$locations->location_name}}">
                        @error('location_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label input-runded"> Address </label>
                    <input disabled type="text" class="form-control Background @error('address') is-invalid @enderror" name="address" value="{{$locations->address}}">
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>