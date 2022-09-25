
                <div class="mb-3">
                    <label for="item_name" class="form-label input-runded"> Nama Item </label>
                    <input  disabled type="text" class="form-control Background @error('item_name') is-invalid @enderror" name="item_name" autofocus
                        value="{{ $items->get(0)->item_name }}">
                        @error('item_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label input-runded"> Stock </label>
                    <input  disabled type="text" class="form-control Background @error('stock') is-invalid @enderror" name="stock" value="{{ $items->get(0)->stock }}">
                    @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

