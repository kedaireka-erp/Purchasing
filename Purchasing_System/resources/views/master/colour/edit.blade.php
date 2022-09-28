<div id="form" style="margin-top: 10px">
    <form method="POST" action="{{ route('colour.update', $colour->id) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name Color <span class="text-danger">*</span> </label>
            <input type="text" name="name" class="form-control" placeholder="-- INPUT --"
                value="{{ $colour->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
