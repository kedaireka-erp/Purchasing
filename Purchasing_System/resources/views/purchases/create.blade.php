<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <h1>Add Purchase Request</h1>
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}
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
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <form action="{{ route('purchase_request.store') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('no_pr') is-invalid @enderror" id="no_pr"
                    placeholder="Nomor PR" name="no_pr">
                <label for="no_pr" class="form-label">Nomor PR</label>
                @error('no-pr')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control @error('deadline_date') is-invalid @enderror"
                    id="deadline_date" placeholder="dd/mm/yyyy" name="deadline_date">
                <label for="deadline_date" class="form-label">Deadline Date</label>
                @error('deadline_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('requester') is-invalid @enderror" id="requester"
                    placeholder="requester" name="requester">
                <label for="requester" class="form-label">Requester</label>
                @error('requester')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
              <label class="mb-3" for="Prefixe">Division Name</label>
              <select class="custom-select d-block w-100 form-control" id="Prefixe" name="prefixes_id">
                  @foreach ($Prefixe as $prefixe)
                      <option value="{{ $prefixe->id }}">{{ $prefixe->divisi }}</option>
                  @endforeach
              </select>
          </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('project') is-invalid @enderror" id="project"
                    placeholder="Project" name="project">
                <label for="project" class="form-label">Project</label>
                @error('project')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="mb-3" for="Location">Location</label>
                <select class="custom-select d-block w-100 form-control" id="Location" name="locations_id">
                    @foreach ($Location as $item)
                        <option value="{{ $item->id }}">{{ ucfirst($item->location_name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="mb-3" for="Ship">Ship</label>
                <select class="custom-select d-block w-100 form-control" id="Ship" name="ships_id">
                    @foreach ($Ship as $ship)
                        <option value="{{ $ship->id }}">{{ $ship->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"id="note" placeholder="note" name="note">
                <label for="note" class="form-label">Note</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('attachment') is-invalid @enderror" id="attachment"
                    placeholder="Attachment" name="attachment">
                <label for="attachment" class="form-label">Attachment</label>
                @error('attachment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Add</button>
            </div>

        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
