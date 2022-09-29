<div style="margin-top: 10px">
    <form id="contactForm" method="post">
        <div class="mb-3">
            <label for="prefix" class="form-label input-runded"> Nama Prefix </label>
            <input type="text" id="prefix" class="form-control Background @error('prefix') is-invalid @enderror"
                name="prefix" value="{{ old('prefix') }}" autofocus>
            @error('prefix')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="divisi" class="form-label input-runded"> Divisi </label>
            <input type="text" id="divisi" class="form-control Background @error('divisi') is-invalid @enderror"
                name="divisi" value="{{ old('divisi') }}">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#contactForm').on('submit', function(event) {
        event.preventDefault();
        // Get Alll Text Box Id's
        prefix = $('#prefix').val();
        divisi = $('#divisi').val();

        $.ajax({
            url: 'purchase_request/create/prefix/store', //Define Post URL
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                prefix: prefix,
                divisi: divisi,
            },
            //Display Response Success Message
            success: function(response) {
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('.btn-close').click();
                prefix_reader();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
