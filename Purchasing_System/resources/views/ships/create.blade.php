@extends('layout.sidebar')

@section ('content')
<br>
<form method="POST" action="{{ url('ships') }}">
    @csrf
 @include('ships.form')

</form>
@endsection