<div tyle="margin-top: 10px">
    <form id="contactForm" method="POST">
        <div class="mb-3">
            <label class="form-label">Supplier Type</label>
            <input type="text" name="vendor" id="vendor" class="form-control" placeholder="Input Supplier">
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
        vendor = $('#vendor').val();

        $.ajax({
            url: 'purchase_request/create/supplier/store', //Define Post URL
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                vendor: vendor,
            },
            //Display Response Success Message
            success: function(response) {
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('.btn-close').click();
                supplier_read();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
