<div style="margin-top: 10px">
    <form id="contactForm" method="POST">
        <div class="mb-3">
            <label class="form-label">Name Color <span class="text-danger">*</span> </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="-- INPUT --" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#contactForm').on('submit', function(event) {
        event.preventDefault();
        // Get Alll Text Box Id's
        name = $('#name').val();

        $.ajax({
            url: 'purchase_request/create/color/store', //Define Post URL
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                name: name,
            },
            //Display Response Success Message
            success: function(response) {
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('.btn-close').click();
                color_read();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
