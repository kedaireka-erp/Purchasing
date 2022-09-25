
        <div id="form" style="margin-top: 20px margin-down:20px">
            <form action="{{ route('satuan.satuanupdate', $satuan->id) }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label input-runded"> Nama Satuan </label>
                    <input type="text" class="form-control Background @error('name') is-invalid @enderror" name="name" autofocus
                        value="{{ old('name', $satuan->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label input-runded"> Unit </label>
                    <input type="text" class="form-control Background @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit', $satuan->unit) }}">
                    @error('unit')
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
