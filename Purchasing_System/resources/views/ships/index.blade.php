@extends('layout.sidebar')

@section('content')
<br> <br>
<a class="btn btn-info" href="{{ url('ships/create') }}">NEW</a>
<br><br>
<form get="GET" action="{{ url('ships') }}">
    <input type="text" name="search">
    <button type="submit">search</button>
</form>
<br>
    <table class="table">       
        <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Ship Type</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        @if(count($datas)==0)
        <tr>
            <td colspan="6" align="center" style="color: gray; background-color: white"><i>
            Data kosong
            </i></td>
        </tr>
        @endif
         <tr>
        @foreach ($datas as $key=>$value)
            <td>{{ $key+$datas->firstitem() }}</td>
            <td>{{ $value->name }}</td>
            <td><a class="btn btn-info" href="{{ url('ships/'.$value->id.'/edit') }}">Edit</a></td>
            <td> 
            <form method="POST" action="{{ url('ships/'.$value->id) }}" >
                @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
            </form> 
        </td>
        </tr>
        @endforeach
    </table>
{{ $datas->links() }}
@endsection