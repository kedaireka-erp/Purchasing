<script type="text/javascript" src="{{ URL::asset('layout/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('layout/main.js') }}"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<!-- Required vendors -->
<!-- Required vendors -->
<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<!-- Datatable -->
<script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>



<script>
    function grade_create() {
        $.get("{{ route('grade.create') }}", {}, function(data, status) {
            $("#GradeModalLabel").html('Add Grade');
            $("#grade_page").html(data);
            $("#exampleModalGradeCenter").modal('show');
        })
    }

    function grade_edit(id) {
        $.get("{{ url('grade/edit') }}/" + id, {}, function(data, status) {
            $("#GradeModalLabel").html('Edit Grade');
            $("#grade_page").html(data);
            $("#exampleModalGradeCenter").modal('show');
        })
    }

    function grade_view(id) {
        $.get("{{ url('grade/view') }}/" + id, {}, function(data, status) {
            $("#GradeModalLabel").html('View Grade');
            $("#grade_page").html(data);
            $("#exampleModalGradeCenter").modal('show');
        })
    }
</script>


<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
