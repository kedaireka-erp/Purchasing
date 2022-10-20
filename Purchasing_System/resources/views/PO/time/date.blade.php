<div class="mb-3">
    <input type="date" class="form-control input-rounded @error('tanggal_kirim') is-invalid @enderror"
        id="deadline_date" placeholder="-- INPUT --" name="tanggal_kirim" value="{{ old('deadline_date') }}">

    @error('tanggal_kirim')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<button type="button" onclick="time_read()" class="btn btn-primary"> Input Master Waktu </button>


<script>
    $(function(){
        var dtToday = new Date();
     
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;
        // alert(maxDate);
        $('#deadline_date').attr('min', maxDate);
    });
    
    </script>