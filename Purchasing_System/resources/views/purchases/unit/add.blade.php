<div id="form" style="margin-top: 10px">
    <form id="contactForm" method="post">
        <div class="mb-3">
            <label for="name" class="form-label input-runded"> Nama Satuan </label>
            <input type="text" class="form-control Background @error('name') is-invalid @enderror" name="name"
                id="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="unit" class="form-label input-runded"> Unit </label>
            <input type="text" class="form-control Background @error('unit') is-invalid @enderror" id="unit"
                name="unit" value="{{ old('unit') }}" required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#contactForm').on('submit', function(event) {
        event.preventDefault();
        // Get Alll Text Box Id's
        name = $('#name').val();
        unit = $('#unit').val();

        $.ajax({
            url: 'purchase_request/create/unit/store', //Define Post URL
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                name: name,
                unit: unit,
            },
            //Display Response Success Message
            success: function(response) {
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('.btn-close').click();
                unit_read();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
