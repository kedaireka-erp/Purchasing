<div style="margin-top: 20px">
    <form id="contactForm" method="post">
        <div class="mb-3">
            <label for="type" class="form-label"> Tipe Pengiriman </label>
            <input class="form-control Background " type="text" id="tipe" name="tipe" autofocus>
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#contactForm').on('submit', function(event) {
        event.preventDefault();
        // Get Alll Text Box Id's
        tipe = $('#tipe').val();

        $.ajax({
            url: 'purchase_request/create/ships/store', //Define Post URL
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                tipe: tipe,
            },
            //Display Response Success Message
            success: function(response) {
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('.btn-close').click();
                ships_reader();
                ships_read();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
