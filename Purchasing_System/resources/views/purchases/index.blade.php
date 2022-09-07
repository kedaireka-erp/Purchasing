<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <h1>Purchase Request</h1>
    <form method="GET">
      <div class="input-group mb-3">
        <input 
          type="text" 
          name="search" 
          value="{{ request()->get('search') }}" 
          class="form-control" 
          placeholder="Search..." 
          aria-label="Search" 
          aria-describedby="button-addon2">
        <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
      </div>
  </form>
    <div class="col-12">
        <a href="{{route('purchase_request.create')}}" class="btn btn-primary" type="submit">Add</a>
      </div>
    <table class="table">
        <tr>
            <td>No_PR</td>
            <td>Deadline Date</td>
            <td>Requester</td>
            <td>Division Name</td>
            <td>Project</td>
            <td>Location</td>
            <td>Ship</td>
            <td>Note</td>
            <td>Attachment</td>
            <td>Action</td>
        </tr>
        @foreach ($purchase_requests as $no => $purchase_request)
        <tr>
            <td>{{$purchase_request->no_pr}}</td>
            <td>{{$purchase_request->deadline_date}}</td>
            <td>{{$purchase_request->requester}}</td>
            <td>{{$purchase_request->Prefixe->divisi}}</td>
            <td>{{$purchase_request->project}}</td>
            <td>{{$purchase_request->location->location_name}}</td>
            <td>{{$purchase_request->Ship->type}}</td>
            <td>{{$purchase_request->note}}</td>
            <td>{{$purchase_request->attachment}}</td>
            <td>
                <a href="{{route("purchase_request.edit", $purchase_request->id)}}" class="btn btn-warning">Edit</a>
                <form action="{{route("purchase_request.destroy", $purchase_request->id)}}" method="post">
                @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
            
        @endforeach

    </table>
    {{ $purchase_requests->links() }}
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>