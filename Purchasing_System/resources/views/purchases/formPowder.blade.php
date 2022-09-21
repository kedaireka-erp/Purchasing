<form action="{{ route('purchase_request.storepowder') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
          <div class="col-6">
              <div class="mb-3">
                  <label for="type" class="form-label font">Type<span style="color:red">*</span></label>
                  <input readonly name="type" id="type" class="form-control input-rounded " value="powder"
                      selected>
              </div>
          </div>
          <div class="col-6">
              <div class="mb-3">
                  <label for="deadline_date" class="form-label">Tanggal
                      Kebutuhan Barang<span style="color:red">*</span></label>
                  <input type="date" class="form-control input-rounded @error('deadline_date') is-invalid @enderror"
                      id="deadline_date" placeholder="-- INPUT --" name="deadline_date"
                      value="{{ old('deadline_date') }}">
  
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
                      id="requester" placeholder="-- INPUT --" name="requester" value="{{ old('requester') }}" autofocus>
  
                  @error('requester')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
  
          <div class="col-6">
              <div class="mb-3">
                  <label for="prefixes_id" class="form-label">Divisi<span style="color:red">*</span></label>
                  <select class="input-rounded d-block w-100 form-control" aria-label="Default select example"
                      id="Prefixe" name="prefixes_id" value="{{ old('prefixes_id') }}">
                      <option selected disabled>-- Pilih Divisi --</option>
                      @foreach ($Prefixe as $prefixe)
                          <option value="{{ $prefixe->id }}">{{ $prefixe->divisi }}</option>
                      @endforeach
                  </select>
                  @error('prefixes_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
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
                  <select class="input-rounded d-block w-100 form-control" id="Location" name="locations_id"
                      value="{{ old('locations_id') }}">
                      <option selected disabled>-- Pilih Lokasi
                          Pengiriman --</option>
                      @foreach ($Location as $item)
                          <option value="{{ $item->id }}">{{ ucfirst($item->location_name) }}
                          </option>
                      @endforeach
                  </select>
                  @error('locations_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
      </div>
  
      <div class="row">
          <div class="col-6">
              <div class="mb-3">
                  <label for="Ship">Kebutuhan/ Pengiriman<span style="color:red">*</span></label>
                  <select class="input-rounded d-block w-100 form-control" id="Ship" name="ships_id"
                      value="{{ old('ships_id') }}">
                      <option selected disabled>--
                          Pilih Kebutuhan/
                          Pengiriman --</option>
  
                      @foreach ($Ship as $ship)
                          <option value="{{ $ship->id }}">{{ $ship->type }}</option>
                      @endforeach
                  </select>
                  @error('ships_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
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
  
  
  
                  {{-- <label for="attachment" class="form-label">Attachment</label>
                    <input type="file"
                        class="form-control input-rounded @error('attachment') is-invalid @enderror"
                        id="attachment" placeholder="Attachment" name="attachment"> --}}
                  {{-- <div class="mb-3">
            <label for="formFile" class="form-label">Images</label>
            <input class="form-control" type="file" id="formFile" name="image">
          </div> --}}
  
                  @error('attachment')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
      </div>
  
      <div class="row">
          <div class="col-lg-6">
              <div class="mb-3">
                  <label for="warna" class="form-label font">warna</label>
                  <input type="text" class="form-control input-rounded" name="warna">
              </div>
          </div>
          <div class="col-lg-6">
              <div class="mb-3">
                  <label for="kode_warna" class="form-label font">Kode Warna</label>
                  <input type="text" class="form-control input-rounded" name="kode_warna">
              </div>
          </div>
      </div>
  
      <div class="row">
          <div class="col-lg-6">
              <div class="mb-3">
                  <label for="Grade">Grade<span style="color:red">*</span></label>
                  <select class="form-control input-rounded d-block w-100" id="Grade" name="grades_id"
                      value="{{ old('grades_id') }}">
                      <option selected disabled>-- Pilih Grade --</option>
                      @foreach ($Grade as $gra)
                          <option value="{{ $gra->id }}">{{ ucfirst($gra->type) }}
                          </option>
                      @endforeach
                  </select>
                  @error('grades_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
          </div>
          <div class="col-lg-6">
              <div class="mb-3">
  
                  <div class="row">
  
                      <div class="col-lg-6">
                          <label for="finish" class="form-label font">Finish</label>
                          <select class="form-control input-rounded" aria-label="Default select example"
                              name="finish">
                              <option selected disabled> -- PILIH OPSI -- </option>
                              <option value="interior"> Interior </option>
                              <option value="eksterior"> Eksterior </option>
                              <option value="SG"> SG </option>
                              <option value="MATT"> MATT </option>
                              <option value="SUPERMATT"> SUPERMATT </option>
                              <option value="GLOSS"> GLOSS </option>
                              <option value="METALLIC"> METALLIC </option>
                              <option value="SAND TEXTURE"> SAND TEXTURE </option>
                              <option value="SUBLIMASI"> SUBLIMASI </option>
                          </select>
                      </div>
  
                  </div>
              </div>
          </div>
  
  
          <div class="row">
              <div class="mb-3">
                  <div class="col-lg-12">
                      <div class="row">
                          <div class="col-4">
                              <label for="quantity" class="form-label font">Qty</label>
                              <input type="text" name="quantity" class="form-control input-rounded"
                                  placeholder="Kg">
                          </div>
                          <div class="col-4">
                              <label for="tanggal_pengajuan" class="form-label font">m2</label>
                              <input type="text" class="form-control input-rounded" name="m2"
                                  placeholder="m2">
                          </div>
                          <div class="col-4">
                              <label for="tanggal_pengajuan" class="form-label font">Estimasi</label>
                              <input type="text" class="form-control input-rounded" name="estimasi"
                                  placeholder="Kgs/m2">
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
                              <label for="tanggal_pengajuan" class="form-label font">Fresh Stock</label>
                              <input type="text" class="form-control input-rounded" placeholder="2" name="fresh">
                          </div>
  
                          <div class="col-4">
                              <label for="tanggal_pengajuan" class="form-label font">Recycle
                                  Stock</label>
                              <input type="text" class="form-control input-rounded" placeholder="2" name="recycle">
                          </div>
  
                          <div class="col-4">
                              <label for="tanggal_pengajuan" class="form-label font">Alokasi
                                  Fresh</label>
                              <input type="text" class="form-control input-rounded" placeholder="2" name="alokasi">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="row">
              <div class="col-lg-6">
                  <div class="mb-3">
                      <label for="Supplier">Supplier<span style="color:red">*</span></label>
                      <select class="input-rounded d-block w-100 form-control" id="Supplier" name="suppliers_id"
                          value="{{ old('suppliers_id') }}">
                          <option selected disabled>-- Pilih Supplier --</option>
                          @foreach ($Supplier as $sup)
                              <option value="{{ $sup->id }}">{{ ucfirst($sup->vendor) }}
                              </option>
                          @endforeach
                      </select>
                      @error('suppliers_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>
  
              <div class="col-lg-6">
                  <div class="mb-3">
                      <label for="tanggal_pengajuan" class="form-label font">Alokasi
                          Outstanding</label>
                      <input type="text" class="form-control input-rounded" placeholder="10" name="alokasi">
                  </div>
              </div>
          </div>
          <div class="mb-3">
              <label for="note" class="form-label">Note</label>
              <textarea rows="4" cols="50" class="form-control input-rounded wide mb-3" placeholder="-- INPUT --"
                  name="note" value="{{ old('note') }}"></textarea>
  
          </div>
  
  
  
          <button type="submit" class="btn btn-primary submit-powder">Submit</button>
  </form>
  