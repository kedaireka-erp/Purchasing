<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="{{ url('store-input-fields') }}" method="POST">
            @csrf
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th><Form>Input</Form></th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][subject]" placeholder="Input Subject" class="form-control" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][quantity]" placeholder="Input Quantity" class="form-control" /></td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></td>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][satuan]" placeholder="Input Satuan" class="form-control" /></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-outline-success btn-block">Save</button>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][subject]" placeholder="Input Subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
            );
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][quantity]" placeholder="Input Quantity" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
            );
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][satuan]" placeholder="Input Satuan" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</html>
