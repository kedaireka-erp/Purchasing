<div id="form" style="margin-top: 10px">
    <div class="mb-3">
        <label class="form-label">Grade Type <span class="text-danger">*</span> </label>
        <input type="text" name="type" class="form-control" disabled value="{{ $grade->type }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Grade Powder</label>
        <select disabled class="form-select form-control wide mb-3" name="grade_powder">

            <option disabled selected>{{ $grade->grade_powder }}</option>
            <option value="Coarse Powder">Coarse Powder</option>
            <option value="Moderately Coarse">Moderately Coarse</option>
            <option value="Moderately Fine">Moderately Fine</option>
            <option value="Fine Powder">Fine Powder</option>
            <option value="Very Fine Powder">Very Fine Powder</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label"> Sieve No. (all particle) </label>
        <select disabled class="form-select form-control wide mb-3" name="sieve_no_all">

            <option selected disabled>{{ $grade->sieve_no_all }}</option>
            <option value="8 -> 1001"> 8 -> 1001 </option>
            <option value="20 -> 1001"> 20 -> 1001 </option>
            <option value="40 -> 1001"> 40 -> 1001 </option>
            <option value="60 -> 1001"> 60 -> 1001 </option>
            <option value="80 -> 1001"> 80 -> 1001 </option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label"> Sieve No. (40% particle) </label>
        <select disabled class="form-select form-control wide mb-3" name="sieve_no_half">

            <option disabled selected>{{ $grade->sieve_no_half }}</option>
            <option value="60 -> 201"> 60 -> 201 </option>
            <option value="60 -> 401"> 60 -> 401 </option>
            <option value="80 -> 401"> 80 -> 401 </option>
            <option value="100 -> 401"> 100 -> 401 </option>
        </select>
    </div>

    <div class="mb-3">
        <label for="note" class="form-label">Note</label>
        <textarea disabled rows="4" cols="50" class="form-control" id="note" placeholder="-- INPUT --"
            name="note" value="{{ old('note') }}">{{ $grade->note }}</textarea>

    </div>
