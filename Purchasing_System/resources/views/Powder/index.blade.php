<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body class="container"><br><br>
    <form method="GET" action="{{ route('powder.') }}">
      <input class="col-sm-11" type="text" name="search" placeholder="search here...">
      <button class="btn btn-secondary">Search</button>
    </form><br>
    <a class="btn btn-secondary" href="{{ route('powder.create') }}">New</a>
    <table class="table table-striped">
        <tr class="table table-secondary">
            <th>No.</th>
            <th>Deadline</th>
            <th>Requester</th>
            <th>Project</th>
            <th>Grade</th>
            <th>Supplier</th>
            <th>Status</th>
            <th colspan="2" align="center" >Action</th>
        </tr>
        @foreach ($powder as $value )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->deadline_date }}</td>
            <td>{{ $value->requester }}</td>
            <td>{{ $value->project }}</td>
            <td>{{ $value->grade->type}}</td>
            <td>{{ $value->supplier->vendor }}</td>
            <td>{{ $value->status }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('powder.edit', $value->id) }}">Edit</a>
            </td>
            <td>
              <form action="{{ route('powder.destroy', $value->id) }}" method="POST">
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