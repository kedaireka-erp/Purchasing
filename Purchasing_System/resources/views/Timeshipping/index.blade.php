<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container"> <br>
    <h1 align="center">Master Timeshipping</h1><br>
    <form method="GET" action="{{ route('timeshipping.') }}">
        <input class="col-sm-11" type="text" name="search" placeholder="search here....">
        <button class="btn btn-secondary">search</button>
    </form><br>
    <a class="btn btn-secondary" href="{{ route('timeshipping.create') }}">New</a>
    <table class="table table-striped">
        <tr class="table table-secondary">
            <th>No.</th>
            <th>Shipping Time</th>
            <th colspan="2">Action</th>
        </tr>
        @if (count($timeshipping)==0)
        <tr>
            <td  colspan="6" align="center" style="color: gray; background-color: white"> 
            <b><i> empty record </i></b></td>
        </tr>
        @endif
        @foreach ($timeshipping as $value)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('timeshipping.edit', $value->id) }}">Edit</a>
            </td>
            <td>
                <form action="{{ route('timeshipping.destroy', $value->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>