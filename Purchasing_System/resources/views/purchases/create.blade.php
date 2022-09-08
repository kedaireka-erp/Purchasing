@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Request')

@section('Judul-content')
    <div class="title-page">
        Tambah Request
    </div>
@endsection

@section('content')
    <div class="container">
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
            <div class="row">
                <div class="col-6">
                    {{-- <div class="mb-3">
                        <label for="no_pr" class="form-label">Nomor PR</label>
                        <input type="text" class="form-control @error('no_pr') is-invalid @enderror" id="no_pr"
                            placeholder="Nomor PR" name="no_pr">
                        @error('no-pr')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="deadline_date" class="form-label">Deadline Date</label>
                        <input type="date" class="form-control @error('deadline_date') is-invalid @enderror"
                            id="deadline_date" placeholder="dd/mm/yyyy" name="deadline_date">

                        @error('deadline_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="requester" class="form-label">Requester</label>
                        <input type="text" class="form-control @error('requester') is-invalid @enderror" id="requester"
                            placeholder="requester" name="requester">

                        @error('requester')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="Prefixe">Division Name</label>
                        <select class="custom-select d-block w-100 form-control" id="Prefixe" name="prefixes_id">
                            @foreach ($Prefixe as $prefixe)
                                <option value="{{ $prefixe->id }}">{{ $prefixe->divisi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="project" class="form-label">Project</label>
                        <input type="text" class="form-control @error('project') is-invalid @enderror" id="project"
                            placeholder="Project" name="project">

                        @error('project')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="Location">Location</label>
                        <select class="custom-select d-block w-100 form-control" id="Location" name="locations_id">
                            @foreach ($Location as $item)
                                <option value="{{ $item->id }}">{{ ucfirst($item->location_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="Ship">Ship</label>
                        <select class="custom-select d-block w-100 form-control" id="Ship" name="ships_id">
                            @foreach ($Ship as $ship)
                                <option value="{{ $ship->id }}">{{ $ship->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Attachment</label>
                        <input type="text" class="form-control @error('attachment') is-invalid @enderror" id="attachment"
                            placeholder="Attachment" name="attachment">

                        @error('attachment')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>



            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea rows="4" cols="50" class="form-control" id="note" placeholder="note" name="note"></textarea>

            </div>


            <button class="btn btn-primary" type="submit">Add</button>


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
@endsection
