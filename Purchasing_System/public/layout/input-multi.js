var i = 0;
$("#dynamic-ar").click(function () {
      ++i;
      $("#dynamicAddRemove").append(
            '<dr><div id="dynamicAddRemove" style="margin-top:6px"> <div class="row"> <div class="col-lg-5">  <div class="row"><div class="col-lg-9 col-md-8"><select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_master_item]"> <option selected disabled>-- Pilih Barang --</option> @foreach ($master_item as $item)<option value="{{ $item->id }}">{{ ucfirst($item->item_name) }}</option> @endforeach </select></div></div> </div><div class="col-lg-2"> <input type="number" name="addMoreInputFields[' + i + '][stok]" placeholder="qty" class ="form-control input-rounded form-control-lg" / > </div><div class="col-lg-4"><div class="row"><div class="col-lg-8 col-md-8"> <select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_satuan]"> <option selected disabled>-- Pilih Satuan --</option> @foreach ($satuan as $sat) <option value="{{ $sat->id }}">{{ ucfirst($sat->unit) }} </option> @endforeach </select></div></div></div><div class="col-lg-1"><button type="button" class="btn btn-outline-danger remove-input-field" id="dynamic-ar">-</button></div><div></div></dr>'
      );
});

$(document).on('click', '.remove-input-field', function () {
      $(this).parents('dr').remove();
});