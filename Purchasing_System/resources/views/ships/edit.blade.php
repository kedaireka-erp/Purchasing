@extends('layout.sidebar')

@section ('content')
<br>
<form method="POST" action="{{ url('ships/'.$model->id) }}">
    @csrf
    <input type="hidden" name="_method" value="patch">

@include('ships.form')

</form>
@endsection