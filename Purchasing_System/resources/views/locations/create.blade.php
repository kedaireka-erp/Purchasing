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
    <h1>Add New Locations</h1>
    @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}
        @php
            Session::forget('success');
        @endphp
        </div>
        
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ul>
    </div>
        
    @endif
    <form action="{{route('location.store')}}" method="post">
      @csrf
  <div class="form-floating mb-3">
      <input type="text" class="form-control @error('location_name') is-invalid @enderror" id="location_name" placeholder="Location Name" name="location_name">
      <label for="location_name" class="form-label">Name</label>
      @error('location_name')
      <span class="text-danger">{{$message}}</span>
          
      @enderror
  </div>
  <div class="form-floating mb-3">
      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="0" name="address">
      <label for="address" class="form-label">Address</label>
      @error('address')
      <span class="text-danger">{{$message}}</span>
          
      @enderror
  </div>
  <div class="col-12">
      <button class="btn btn-primary" type="submit">Add</button>
  </div>

</form>
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