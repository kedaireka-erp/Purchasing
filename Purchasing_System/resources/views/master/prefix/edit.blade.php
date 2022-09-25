
                <div id="form" style="margin-top: 20px margin-down:20px">
                    <form action="{{ route('prefix.prefixupdate', $prefix->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="prefix" class="form-label input-runded"> Nama Satuan </label>
                            <input type="text" class="form-control Background @error('prefix') is-invalid @enderror"
                                name="prefix" autofocus value="{{ old('prefix', $prefix->prefix) }}">
                            @error('prefix')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="divisi" class="form-label input-runded"> Unit </label>
                            <input type="text" class="form-control Background @error('divisi') is-invalid @enderror"
                                name="divisi" value="{{ old('divisi', $prefix->divisi) }}">
                            @error('divisi')
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
