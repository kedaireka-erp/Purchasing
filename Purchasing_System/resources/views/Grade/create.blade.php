<div id="form" style="margin-top: 10px">
    <form method="POST" action="{{ route('grade.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Grade Type <span class="text-danger">*</span> </label>
            <input type="text" name="type" class="form-control" placeholder="-- INPUT --"
                value="{{ $grade->type }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Grade Powder</label>
            <select class="form-select form-control wide mb-3" name="grade_powder">

                <option disabled selected>-- Pilih --</option>
                <option value="Coarse Powder">Coarse Powder</option>
                <option value="Moderately Coarse">Moderately Coarse</option>
                <option value="Moderately Fine">Moderately Fine</option>
                <option value="Fine Powder">Fine Powder</option>
                <option value="Very Fine Powder">Very Fine Powder</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label"> Sieve No. (all particle) </label>
            <select class="form-select form-control wide mb-3" name="sieve_no_all">

                <option selected disabled>-- Pilih --</option>
                <option value="8 -> 1001"> 8 -> 1001 </option>
                <option value="20 -> 1001"> 20 -> 1001 </option>
                <option value="40 -> 1001"> 40 -> 1001 </option>
                <option value="60 -> 1001"> 60 -> 1001 </option>
                <option value="80 -> 1001"> 80 -> 1001 </option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label"> Sieve No. (40% particle) </label>
            <select class="form-select form-control wide mb-3" name="sieve_no_half">

                <option disabled selected>-- Pilih --</option>
                <option value="60 -> 201"> 60 -> 201 </option>
                <option value="60 -> 401"> 60 -> 401 </option>
                <option value="80 -> 401"> 80 -> 401 </option>
                <option value="100 -> 401"> 100 -> 401 </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea rows="4" cols="50" class="form-control" id="note" placeholder="-- INPUT --" name="note"
                value="{{ old('note') }}"></textarea>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
