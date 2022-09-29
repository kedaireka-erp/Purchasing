<div id="form" style="margin-top: 10px">
    <form method="POST" id="contactForm">
        @csrf
        <div class="mb-3">
            <label class="form-label">Grade Type <span class="text-danger">*</span> </label>
            <input type="text" id="tipe" name="tipe" class="form-control" placeholder="-- INPUT --" required>
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
        tipe = $('#tipe').val();

        $.ajax({
            url: 'purchase_request/create/grade/store', //Define Post URL
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
                grade_read();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
