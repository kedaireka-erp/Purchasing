@extends('layout.sidebar')

@section('judul-laman', 'Create Purchase Request')

@section('Judul-content')
    <div class="title-page">
        Tambah Request
    </div>
@endsection

@section('datatable')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)"> Add Data</a></li>
        </ol>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        {{-- <h4 class="card-title">Nav Pills Tabs</h4> --}}
    </div>
    <div class="card-body">
        <ul class="nav nav-pills justify-content-around mb-4 light">
            <li class=" nav-item">
                <a href="#navpills-1" class="title-form nav-link active" data-bs-toggle="tab" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-square mr-3" viewBox="0 0 16 16">
                        <path d="M0 6a6 6 0 1 1 12 0A6 6 0 0 1 0 6z"/>
                        <path d="M12.93 5h1.57a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1.57a6.953 6.953 0 0 1-1-.22v1.79A1.5 1.5 0 0 0 5.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 4h-1.79c.097.324.17.658.22 1z"/>
                      </svg>
                      Powder</a>
            </li>
            <li class="nav-item">
                <a href="#navpills-2" class="title-form nav-link" data-bs-toggle="tab" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2 mr-3" viewBox="0 0 16 16">
                        <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
                      </svg>
                    Other Good</a>
            </li>
        </ul>
        <div class="tab-content" style="margin-top:70px">
            <div id="navpills-1" class="tab-pane active">
                <div class="row">
                    <div> 
                        <form action="{{ route('wirehouse.purchase_request.storepowder_wirehouse') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                  <div class="col-6">
                                      <div class="mb-3">
                                          <label for="type" class="form-label font">Type Boss<span style="color:red">*</span></label>
                                          <input readonly name="type" id="type" class="form-control input-rounded " value="powder"
                                              selected>
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="mb-3">
                                          <label for="deadline_date" class="form-label">Tanggal
                                              Kebutuhan Barang<span style="color:red">*</span></label>
                                          <input id="inputdate_powder" type="date" class="form-control input-rounded @error('deadline_date') is-invalid @enderror"
                                              id="deadline_date" placeholder="-- INPUT --" name="deadline_date"
                                              value="{{ old('deadline_date') }}" required>
                          
                                          @error('deadline_date')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>
                              </div>
                          
                          
                              <div class="row">
                                  <div class="col-6">
                                      <div class="mb-3">
                                          <label for="requester" class="form-label">Requester<span style="color:red">*</span></label>
                                          <input type="text" class="form-control input-rounded @error('requester') is-invalid @enderror"
                                              id="requester" placeholder="-- INPUT --" name="requester" value="{{ old('requester') }}" autofocus required>
                          
                                          @error('requester')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>
                          
                                  <div class="col-6">
                                      <div class="mb-3">
                                          <label for="prefixes_id" class="form-label">Divisi<span style="color:red">*</span></label>
                                          <div class="row">
                                              <div class="col-lg-10 col-md-9">
                                                  <div id="reader_prefix"></div>
                                                  @error('prefixes_id')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                              </div>
                                              <div class="col-lg-2 col-md-3">
                                                  <a onClick="prefix_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                                                      style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                          style="font-size:14px"></i>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          
                              <div class="row">
                                  <div class="col-6">
                                      <div class="mb-3">
                                          <label for="project" class="form-label">Project/Customer</label>
                                          <input type="text" class="form-control input-rounded @error('project') is-invalid @enderror"
                                              id="project" placeholder="-- INPUT --" name="project" value="{{ old('project') }}">
                          
                                          @error('project')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="mb-3">
                                          <label for="Location">Lokasi<span style="color:red">*</span></label>
                                          <div class="row">
                                              <div class="col-lg-10 col-md-9">
                                                  <div id="reader_location"></div>
                                                  @error('locations_id')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                              </div>
                                              <div class="col-lg-2 col-md-3">
                                                  <a onClick="location_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                                                      style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                          style="font-size:14px"></i>
                                                  </a>
                                              </div>
                                          </div>
                          
                          
                                      </div>
                                  </div>
                              </div>
                          
                              <div class="row">
                                  <div class="col-6">
                                      <div class="mb-3">
                                          <label for="Ship">Kebutuhan/ Pengiriman<span style="color:red">*</span></label>
                                          <div class="row">
                                              <div class="col-lg-10 col-md-9">
                                                  <div id="reader_ships"></div>
                                                  @error('ships_id')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                              </div>
                                              <div class="col-lg-2 col-md-3">
                                                  <a onClick="ships_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                                                      style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                          style="font-size:14px"></i>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="mb-3">
                          
                                          <div class="basic-form custom_file_input">
                          
                                              <label for="attachment" class="form-label">Attachment</label>
                                              <div class="input-group input-group-lg">
                                                  <span class="input-group-text">Upload</span>
                                                  <div class="form-file">
                                                      <input type="file"
                                                          class="form-file-input form-control input-rounded @error('attachment') is-invalid @enderror"
                                                          id="attachment" placeholder="Attachment" name="attachment">
                                                  </div>
                                              </div>
                          
                          
                                          </div>
                          
                          
                                          @error('attachment')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>
                              </div>
                          
                          
                          
                          
                              <div class="row">
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="warna" class="form-label font">warna<span style="color:red">*</span></label></label>
                                          <input type="text" class="form-control input-rounded @error('warna') is-invalid @enderror" placeholder="--INPUT--" name="warna" required>
                                          @error('warna')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                      </div>
                          
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="Grade">Kode Warna<span style="color:red">*</span></label>
                          
                                          <div class="row">
                                              <div class="col-lg-10 col-md-9">
                                                  <div id="reader_color" class=" @error('color_id') is-invalid @enderror"></div>
                                                  @error('color_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                                              </div>
                                              <div class="col-lg-2 col-md-3">
                                                  <a onClick="color_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                                                      style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                          style="font-size:14px"></i>
                                                  </a>
                                              </div>
                                          </div>
                          
                          
                                      </div>
                                  </div>
                              </div>
                          
                              <div class="row">
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="Grade">Grade<span style="color:red">*</span></label>
                          
                                          <div class="row">
                                              <div class="col-lg-10 col-md-9">
                                                  <div id="reader_grade"></div>
                                                  @error('grades_id')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                              </div>
                                              <div class="col-lg-2 col-md-3">
                                                  <a onClick="grade_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                                                      style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                          style="font-size:14px"></i>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="Supplier">Supplier<span style="color:red">*</span></label>
                                          <div class="row">
                                              <div class="col-lg-10 col-md-9">
                                                  <div id="reader_supplier"></div>
                                                  @error('suppliers_id')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                              </div>
                                              <div class="col-lg-2 col-md-3">
                                                  <a onClick="supplier_create()" data-bs-toggle="modal"
                                                      data-bs-target="#exampleModalPowderCenter" style="width: 100%"
                                                      class="input-rounded btn btn-primary"> <i class="fa fa-plus" style="font-size:14px"></i>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          
                              <div class="row">
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                          
                          
                                          <label for="finish" class="form-label font">Finish<span style="color:red">*</span></label></label>
                                          <select class="default-select input-rounded form-control wide mb-3 @error('finish') is-invalid @enderror"
                                              aria-label="Default select example" name="finish" required>
                                              <option selected disabled> -- PILIH OPSI -- </option>
                                              <option value="interior"> Interior </option>
                                              <option value="eksterior"> Eksterior </option>
                                          </select>
                                          @error('finish')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                          
                          
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                          
                          
                                          <label for="finishing" class="form-label font">Finishing<span style="color:red">*</span></label></label>
                                          <select class="default-select input-rounded form-control wide mb-3 @error('finishing') is-invalid @enderror"
                                              aria-label="Default select example" name="finishing" required>
                                              <option selected disabled> -- PILIH OPSI-- </option>
                                              <option value="SG"> SG </option>
                                              <option value="MATT"> MATT </option>
                                              <option value="SUPERMATT"> SUPERMATT </option>
                                              <option value="GLOSS"> GLOSS </option>
                                              <option value="METALLIC"> METALLIC </option>
                                              <option value="SAND TEXTURE"> SAND TEXTURE </option>
                                              <option value="SUBLIMASI"> SUBLIMASI </option>
                                          </select>
                                          @error('finishing')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                          
                          
                                      </div>
                                  </div>
                          
                          
                              </div>
                          
                              <div class="row">
                                  <div class="mb-3">
                                      <div class="col-lg-12">
                                          <div class="row">
                                              <div class="col-4">
                                                  <label for="quantity" class="form-label font">Quantity<span style="color:red">*</span></label></label>
                                                  <input type="number" name="quantity" class="form-control input-rounded @error('quantity') is-invalid @enderror"
                                                      placeholder="--INPUT--" required>
                                                      @error('quantity')
                                                          <span class="text-danger">{{ $message }}</span>
                                                      @enderror
                                              </div>
                                              <div class="col-4">
                                                  <label for="tanggal_pengajuan" class="form-label font">m2<span style="color:red">*</span></label></label>
                                                  <input type="text" class="form-control input-rounded @error('m2') is-invalid @enderror" name="m2"
                                                      placeholder="--INPUT--" required>
                                                      @error('m2')
                                                          <span class="text-danger">{{ $message }}</span>
                                                      @enderror
                                              </div>
                                              <div class="col-4">
                                                  <label for="tanggal_pengajuan" class="form-label font">Estimasi m2/Kg<span style="color:red">*</span></label></label>
                                                  <input type="number" class="form-control input-rounded @error('estimasi') is-invalid @enderror" name="estimasi"
                                                      placeholder="--INPUT--" required>
                                                      @error('estimasi')
                                                          <span class="text-danger">{{ $message }}</span>
                                                      @enderror
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          
                              <div class="row">
                                  <div class="mb-3">
                                      <div class="col-lg-12">
                                          <div class="row">
                          
                                              <div class="col-4">
                                                  <label for="tanggal_pengajuan" class="form-label font">Stock Powder Fresh (Kgs)<span style="color:red">*</span></label></label>
                                                  <input type="number" class="form-control input-rounded @error('fresh') is-invalid @enderror" placeholder="--INPUT--"
                                                      name="fresh" required>
                                                      @error('fresh')
                                                          <span class="text-danger">{{ $message }}</span>
                                                      @enderror
                                              </div>
                          
                                              <div class="col-4">
                                                  <label for="tanggal_pengajuan" class="form-label font">Stock Powder Recycle (Kgs)<span style="color:red">*</span></label></label>
                                                  <input type="number" class="form-control input-rounded @error('recycle') is-invalid @enderror" placeholder="--INPUT--"
                                                      name="recycle" required>
                                                      @error('recycle')
                                                          <span class="text-danger">{{ $message }}</span>
                                                      @enderror
                                              </div>
                          
                                              <div class="col-4">
                                                  <label for="tanggal_pengajuan" class="form-label font">Alokasi powder Fresh<span style="color:red">*</span></label></label>
                                                  <input type="number" class="form-control input-rounded @error('alokasi') is-invalid @enderror" placeholder="--INPUT--"
                                                      name="alokasi" required>
                                                      @error('alokasi')
                                                          <span class="text-danger">{{ $message }}</span>
                                                      @enderror
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          
                          
                          
                          
                              <div class="mb-3">
                                  <label for="note" class="form-label">Note</label>
                                  <textarea class="form-control input-rounded" id="note" placeholder="-- INPUT --" name="note"
                                      value="{{ old('note') }}"></textarea>
                          
                              </div>
                          
                          
                          
                          
                          
                              <button type="submit" class="btn btn-primary submit-powder">Submit</button>
                          </form>
                          
                    </div>
                </div>
            </div>
            <div id="navpills-2" class="tab-pane">
                <form action="{{ route('wirehouse.purchase_request.storegood_wirehouse') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="type" class="form-label font">Type<span
                                                        style="color:red">*</span></label>
                                                <input readonly name="type" id="type"
                                                    class="form-control input-rounded form-control" value="othergood"
                                                    selected>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="deadline_date" class="form-label">Tanggal
                                                    Kebutuhan Barang<span style="color:red">*</span></label>
                                                <input type="date" id="inputdate_good"
                                                    class="form-control input-rounded @error('deadline_date') is-invalid @enderror"
                                                    id="deadline_date" placeholder="-- INPUT --" name="deadline_date"
                                                    value="{{ old('deadline_date') }}" required>

                                                @error('deadline_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="requester" class="form-label">Requester<span
                                                        style="color:red">*</span></label>
                                                <input type="text"
                                                    class="form-control input-rounded @error('requester') is-invalid @enderror"
                                                    id="requester" placeholder="-- INPUT --" name="requester"
                                                    value="{{ old('requester') }}" autofocus required>

                                                @error('requester')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="prefixes_id" class="form-label">Divisi<span
                                                        style="color:red">*</span></label>
                                                <div class="row">
                                                    <div class="col-lg-10 col-md-9">
                                                        <div id="read_prefix"></div>
                                                        @error('prefixes_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="col-lg-2 col-md-3">
                                                        <a onClick="prefix_create()" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalPowderCenter" style="width: 100%"
                                                            class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                                style="font-size:14px"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="project" class="form-label">Project/Customer</label>
                                                <input type="text"
                                                    class="form-control input-rounded @error('project') is-invalid @enderror"
                                                    id="project" placeholder="-- INPUT --" name="project"
                                                    value="{{ old('project') }}">

                                                @error('project')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="Location">Lokasi<span style="color:red">*</span></label>
                                                <div class="row">
                                                    <div class="col-lg-10 col-md-9">
                                                        <div id="read_location"></div>
                                                        @error('locations_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-2 col-md-3">
                                                        <a onClick="location_create()" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalPowderCenter" style="width: 100%"
                                                            class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                                style="font-size:14px"></i>
                                                        </a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="Ship">Kebutuhan/ Pengiriman<span
                                                        style="color:red">*</span></label>
                                                <div class="row">
                                                    <div class="col-lg-10 col-md-9">
                                                        <div id="read_ships"></div>
                                                        @error('ships_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-2 col-md-3">
                                                        <a onClick="ships_create()" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalPowderCenter" style="width: 100%"
                                                            class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                                                style="font-size:14px"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">

                                                <div class="basic-form custom_file_input">

                                                    <label for="attachment" class="form-label">Attachment</label>
                                                    <div class="input-group input-group-lg">
                                                        <span class="input-group-text">Upload</span>
                                                        <div class="form-file">
                                                            <input type="file"
                                                                class="form-file-input form-control input-rounded @error('attachment') is-invalid @enderror"
                                                                id="attachment" placeholder="Attachment"
                                                                name="attachment">
                                                        </div>
                                                    </div>


                                                </div>


                                                @error('attachment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" style="background-color:#cab9e7">
                                            <strong> Tambah barang </strong>
                                        </div>
                                        <div class="card-body" style="background-color: #f7f4f4">


                                            <div id="dynamicAddRemove">

                                                <div class="row">

                                                    <div class="col-lg-5">
                                                        <label for="nama_barang" class="form-label">Nama Barang<span
                                                            style="color:red">*</span></label>

                                                        <div class="row">
                                                            <div class="col-lg-9 col-md-8">
                                                                <div id="reader_item"></div>
                                                                @error('id_master_item')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                 @enderror
                                                            </div>
                                                            <div class="col-lg-3 col-md-4">
                                                                <a onClick="item_create()" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalPowderCenter"
                                                                    style="width: 100%"
                                                                    class="input-rounded btn btn-primary"> <i
                                                                        class="fa fa-plus" style="font-size:14px"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <label for="quantity" class="form-label">Quantity<span
                                                            style="color:red">*</span></label>
                                                        <input type="number" value="{{ old('stok') }}" name="addMoreInputFields[0][stok]"
                                                            placeholder="qty" required
                                                            class="form-control input-rounded form-control-lg" />
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="satuan" class="form-label">Satuan<span
                                                            style="color:red">*</span></label>

                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-8">
                                                                <div id="reader_unit"></div>
                                                                @error('id_satuan')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                 @enderror
                                                            </div>
                                                            <div class="col-lg-4 col-md-4">
                                                                <a onClick="unit_create()" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalPowderCenter"
                                                                    style="width: 100%"
                                                                    class="input-rounded btn btn-primary"> <i
                                                                        class="fa fa-plus" style="font-size:14px"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-1 col">
                                                        <label for="quantity" class="form-label">Aksi</label>
                                                        <button type="button" name="add" id="dynamic-ar"
                                                            class="btn btn-outline-primary">+</button>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                    {{-- Start --}}

                                    {{-- End --}}
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note</label>
                                        <textarea class="form-control input-rounded" id="note1" placeholder="-- INPUT --" name="note"
                                            value="{{ old('note') }}"></textarea>

                                    </div>


                                    <button class="btn btn-primary" type="submit"
                                        style="margin-top:20px">Submit</button>
                                </form>
            </div>
            </div>
        </div>
    </div>
</div>
   
        <div class="modal fade" id="exampleModalPowderCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" align="center" id="PowderModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="powder_page" class="pd-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>




    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
    var i = 0;
$("#dynamic-ar").click(function () {
      ++i;
      $("#dynamicAddRemove").append(
            '<dr><div id = "dynamicAddRemove" style = "margin-top:6px"><div class="row"><div class="col-lg-5"><div class="row"><div class="col-lg-9 col-md-8"><select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_master_item]"><option selected disabled>-- Pilih Barang --</option>@foreach($master_item as $item)<option value="{{ $item->id }}">{{ ucfirst($item-> item_name) }}</option>@endforeach</select></div><div class="col-lg-3 col-md-4"></div></div></div><div class="col-lg-2"><input type="number" name="addMoreInputFields[' + i + '][stok]" placeholder="qty" class="form-control input-rounded form-control-lg" /></div><div class="col-lg-4"><div class="row"><div class="col-lg-8 col-md-8"><select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_satuan]"><option selected disabled>-- Pilih Satuan --</option> @foreach ($satuan as $sat) <option value="{{ $sat->id }}">{{ ucfirst($sat-> unit) }} </option> @endforeach </select></div><div class="col-lg-4 col-md-4"></div></div></div><div class="col-lg-1"><button type="button" class="btn btn-outline-danger remove-input-field" id="dynamic-ar">-</button></div><div></div></dr>'
      );
});

$(document).on('click', '.remove-input-field', function () {
      $(this).parents('dr').remove();
});
    </script>
    <script src="{{ asset('layout/ckeditor.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            prefix_read();
            location_read();
            ships_read();
            item_read();
            unit_read();
            color_read();
            supplier_read();
            grade_read();
            prefix_reader();
            location_reader();
            ships_reader();
            color_reader();
            supplier_reader();
            grade_reader();
        });

        function location_read() {
            $.get("{{ url('purchase_request/create/location/read') }}", {}, function(data, status) {
                $("#reader_location").html(data);
            });
        }

        function location_create() {
            $.get("{{ url('purchase_request/create/location') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Location');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function supplier_read() {
            $.get("{{ url('purchase_request/create/supplier/read') }}", {}, function(data, status) {
                $("#reader_supplier").html(data);
            });
        }

        function supplier_create() {
            $.get("{{ url('purchase_request/create/supplier') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Supplier');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }


        function color_read() {
            $.get("{{ url('purchase_request/create/color/read') }}", {}, function(data, status) {
                $("#reader_color").html(data);
            });
        }

        function color_create() {
            $.get("{{ url('purchase_request/create/color') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Color');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function prefix_read() {
            $.get("{{ url('purchase_request/create/prefix/read') }}", {}, function(data, status) {
                $("#reader_prefix").html(data);
            });
        }

        function prefix_create() {
            $.get("{{ url('purchase_request/create/prefix') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Prefix');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function grade_read() {
            $.get("{{ url('purchase_request/create/grade/read') }}", {}, function(data, status) {
                $("#reader_grade").html(data);
            });
        }

        function grade_create() {
            $.get("{{ url('purchase_request/create/grade') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Grade');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function ships_read() {
            $.get("{{ url('purchase_request/create/ships/read') }}", {}, function(data, status) {
                $("#reader_ships").html(data);
            });
        }

        function ships_create() {
            $.get("{{ url('purchase_request/create/ships') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Kebutuhan');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function item_read() {
            $.get("{{ url('purchase_request/create/item/read') }}", {}, function(data, status) {
                $("#reader_item").html(data);
            });
        }

        function item_create() {
            $.get("{{ url('purchase_request/create/item') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Item');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function unit_read() {
            $.get("{{ url('purchase_request/create/unit/read') }}", {}, function(data, status) {
                $("#reader_unit").html(data);
            });
        }

        function unit_create() {
            $.get("{{ url('purchase_request/create/unit') }}", {}, function(data, status) {
                $("#PowderModalLabel").html('Add Unit');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }

        function location_reader() {
            $.get("{{ url('purchase_request/create/location/read') }}", {}, function(data, status) {
                $("#read_location").html(data);
            });
        }



        function supplier_reader() {
            $.get("{{ url('purchase_request/create/supplier/read') }}", {}, function(data, status) {
                $("#read_supplier").html(data);
            });
        }




        function prefix_reader() {
            $.get("{{ url('purchase_request/create/prefix/read') }}", {}, function(data, status) {
                $("#read_prefix").html(data);
            });
        }



        function ships_reader() {
            $.get("{{ url('purchase_request/create/ships/read') }}", {}, function(data, status) {
                $("#read_ships").html(data);
            });
        }
    </script>   

<script>
    $(function(){
        var dtToday = new Date();
     
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;
        // alert(maxDate);
        $('#inputdate_good').attr('min', maxDate);
        $('#inputdate_powder').attr('min', maxDate);
    });
    
    </script>
@endsection
