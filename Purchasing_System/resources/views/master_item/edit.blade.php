
        <div id="form" style="margin-top: 20px margin-down:20px">
        <form action="{{route('master_item.update', $items->get(0)->id)}}" method="post">
                {{ csrf_field() }}
                {{-- <input type="hidden" name="id_master_item" value="{{ $items->id}}"> <br/> --}}
                <div class="mb-3">
                    <label for="item_name" class="form-label input-runded"> Nama Item </label>
                    <input type="text" class="form-control Background @error('item_name') is-invalid @enderror" name="item_name" autofocus
                      value="{{ $items->get(0)->item_name}}" >
                        @error('item_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label input-runded"> Stock </label>
                    <input type="text" class="form-control Background @error('stock') is-invalid @enderror" name="stock"  value="{{ $items->get(0)->stock}}" >
                    @error('stock')
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

