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
        <h1>Edit Locations</h1>
        <form action="{{ route('purchase_request.update', $purchase_requests->id) }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="no_pr" placeholder="Nomor PR" name="no_pr"
                    value="{{ $purchase_requests->no_pr }}">
                <label for="no_pr" class="form-label">Nomor PR</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="deadline_date" placeholder="dd/mm/yyyy"
                    name="deadline_date" value="{{ $purchase_requests->deadline_date }}">
                <label for="deadline_date" class="form-label">Deadline Date</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="requester" placeholder="requester" name="requester"
                    value="{{ $purchase_requests->requester }}">
                <label for="requester" class="form-label">Requester</label>
            </div>
            <div class="mb-3">
                <label class="mb-3" for="Prefixe">Division Name</label>
                <select class="custom-select d-block w-100 form-control" id="Prefixe" name="prefixes_id">
                    @foreach ($Prefixe as $prefixe)
                        <option value="{{ $prefixe->id }}"
                            {{ $prefixe->id == $purchase_requests->prefixe_id ? 'selected' : '' }}>{{ $prefixe->divisi }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control " id="project" placeholder="Project" name="project"
                    value="{{ $purchase_requests->project }}">
                <label for="project" class="form-label">Project</label>
            </div>
            <div class="mb-3">
                <label class="mb-3" for="Location">Location</label>
                <select class="custom-select d-block w-100 form-control" id="Location" name="locations_id">
                    @foreach ($Location as $location)
                        <option value="{{ $location->id }}"
                            {{ $location->id == $purchase_requests->location_id ? 'selected' : '' }}>
                            {{ $location->location_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="mb-3" for="Ship">Ship</label>
                <select class="custom-select d-block w-100 form-control" id="Ship" name="ships_id">
                    @foreach ($Ship as $ship)
                        <option value="{{ $ship->id }}"
                            {{ $ship->id == $purchase_requests->ships_id ? 'selected' : '' }}>{{ $ship->type }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"id="note" placeholder="note" name="note"
                    value="{{ $purchase_requests->note }}">
                <label for="note" class="form-label">Note</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="attachment" placeholder="Attachment" name="attachment"
                    value="{{ $purchase_requests->attachment }}">
                <label for="attachment" class="form-label">Attachment</label>

            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save</button>
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
