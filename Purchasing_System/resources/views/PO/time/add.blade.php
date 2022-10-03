<div id="form" style="margin-top: 10px">
    <form method="POST" id="contactForm">
        @csrf
        <div>
            <label class="form-label">Waktu Pengiriman</label>
            <input type="text" name="name_time" id="name_time" class="form-control" placeholder="Input Time Shipping">
            @foreach ($errors->get('name') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div> <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#contactForm').on('submit', function(event) {
        event.preventDefault();
        // Get Alll Text Box Id's
        name_time = $('#name_time').val();

        $.ajax({
            url: 'order/create/time/store', //Define Post URL
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                name_time: name_time,
            },
            //Display Response Success Message
            success: function(response) {
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('.btn-close').click();
                time_read();
                time_reader();

                document.getElementById("contactForm").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 4000);
            },
        });
    });
</script>
