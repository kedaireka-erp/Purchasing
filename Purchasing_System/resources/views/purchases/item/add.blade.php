<div style="margin-top: 10px">
    <form id="contactForm" method="post">
        <div class="mb-3">
            <label for="item_name" class="form-label input-runded"> Nama Item </label>
            <input type="text" class="form-control Background @error('item_name') is-invalid @enderror" id="item_name"
                name="item_name" value="{{ old('item_name') }}" autofocus>
            @error('item_name')
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
        item_name = $('#item_name').val();

        $.ajax({
            url: 'purchase_request/create/item/store', //Define Post URL
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                item_name: item_name,
            },
            //Display Response Success Message
            success: function(response) {
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('.btn-close').click();
                item_read();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
