<div class="row clearfix">
    <div class="col md-6">ship type</div>

    <div class="col md-6">
        <input type="text" name="name" value="{{ $model->name }}">
        @foreach ($errors->get('name') as $msg )
            <p class="text-danger">{{ $msg }}</p>
        @endforeach 
        <br> <br>
    </div>
</div>
<button class= "btn btn-info" type="submit">SAVE</button>