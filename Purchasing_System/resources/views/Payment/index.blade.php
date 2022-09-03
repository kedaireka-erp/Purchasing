<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
  </head>
  <body class="container">
    <br>
    <h1 class="col-sm-12 text-center">Master Payments</h1>
    <br>
    <form method="GET" action="{{ route('payment.') }}">
      <input class="col-sm-11" type="text" name="search" placeholder="Search here...">
      <button class="btn btn-secondary">Search</button>
    </form>
    <br>
    <a class="btn btn-secondary" href="{{ route('payment.create') }}">NEW</a>
    <table class="table table-striped">
        <tr class="table table-secondary">
            <th>No.</th>
            <th>Payment</th>
            <th colspan="1" class="text-center">Action</th>
            <th></th>
        </tr>
        @if (count($payments)==0)
            <tr>
            <td colspan="6" align="center" style="color: gray; background-color: white"><i>
            empty record
            </i></td>
        </tr>
        @endif
        <tr>
        @foreach ($payments as $key => $value )
            <td>{{ $key+$payments->firstitem() }}</td>
            <td>{{ $value->name }}</td>
            <td>
              <a class="btn btn-info" href="{{ route('payment.edit', $value->id) }}">Edit</a>
            </td>
            <td>
               <form action="{{ route('payment.destroy', $value->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
        </tr>    
        @endforeach
    </table>
    {{ $payments->links() }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>