<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body class="container"><br><br>
    <form method="POST" action="{{ route('powder.store') }}">
    @csrf
        <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Deadline Date</label>
                <input type="date" name="deadline_date" class="form-control" placeholder="input date" value="{{ $powder->deadline_date }}">
            </div>
            <div class="col-lg-6">
                <label class="form-label">Requseter</label>
                <input type="text" name="requester" class="form-control" placeholder="input requester" value="{{ $powder->requester }}">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Project</label>
                <input type="text" name="project" class="form-control" placeholder="input project" value="{{ $powder->project }}">
            </div>
            <div class="col-lg-6">
                <label class="form-label">Note</label>
                <input type="text" name="note" class="form-control" placeholder="input note" value="{{ $powder->note }}">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Attachment</label>
                <input type="text" name="attachment" class="form-control" placeholder="input attachment" value="{{ $powder->attachment }}">
            </div>
            <div class="col-lg-6">
                <label class="form-label">Grade</label>
                <select class="form-select" name="id_grade" id="id_grade">
                    <option disabled value>--Chose Grade--</option>
                    @foreach ($grade as $value)
                    <option value="{{ $value->id }}">{{ $value->type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Supplier</label>
                <select class="form-select" name="id_supplier" id="is_supplier">
                    <option disabled value>--chose supplier--</option>
                    @foreach ($supplier as $value)
                    <option value="{{ $value->id }}">{{ $value->vendor }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6">
                <label class="form-label">Warna</label>
                <input type="text" name="warna" class="form-control" placeholder="input attachment" value="{{ $powder->warna }}">
            </div>
        </div>
         <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Kode Warna</label>
                <input type="text" name="kode_warna" class="form-control" placeholder="input project" value="{{ $powder->kode_warna }}">
            </div>
            <div class="col-lg-6">
                <label class="form-label">Finish</label>
                <input type="text" name="finish" class="form-control" placeholder="input note" value="{{ $powder->finish }}">
            </div>
        </div>
         <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="input project" value="{{ $powder->quantity }}">
            </div>
            <div class="col-lg-6">
                <label class="form-label">m2</label>
                <input type="text" name="m2" class="form-control" placeholder="input note" value="{{ $powder->m2 }}">
            </div>
        </div>
         <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Estimasi</label>
                <input type="text" name="estimasi" class="form-control" placeholder="input project" value="{{ $powder->estimasi }}">
            </div>
            <div class="col-lg-6">
                <label class="form-label">Fresh Stock</label>
                <input type="text" name="fresh" class="form-control" placeholder="input note" value="{{ $powder->fresh }}">
            </div>
            <div class="row">
            <div class="col-lg-6">
                <label class="form-label">Recycle Stock</label>
                <input type="text" name="recycle" class="form-control" placeholder="input project" value="{{ $powder->recycle }}">
            </div>
            <div class="col-lg-6">
                <label class="form-label">Alokasi Stock</label>
                <input type="text" name="alokasi" class="form-control" placeholder="input note" value="{{ $powder->alokasi }}">
            </div>
        </div>
        </div><br>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>