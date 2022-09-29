<div style="margin-top: 10px">
    <form id="contactForm" method="POST">
        <div class="mb-3">
            <label for="location_name" class="form-label input-runded"> Nama Tempat </label>
            <input type="text" class="form-control Background @error('location_name') is-invalid @enderror"
                id="location_name" name="location_name" value="{{ old('location_name') }}" autofocus>
            @error('location_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="address" class="form-label input-runded"> Alamat Lengkap </label>
            <input type="text" class="form-control Background @error('address') is-invalid @enderror" name="address"
                id="address" value="{{ old('address') }}">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#contactForm').on('submit', function(event) {
        event.preventDefault();
        // Get Alll Text Box Id's
        location_name = $('#location_name').val();
        address = $('#address').val();

        $.ajax({
            url: 'purchase_request/create/location/store', //Define Post URL
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                location_name: location_name,
                address: address,
            },
            //Display Response Success Message
            success: function(response) {
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('.btn-close').click();
                location_read();
                location_reader();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
