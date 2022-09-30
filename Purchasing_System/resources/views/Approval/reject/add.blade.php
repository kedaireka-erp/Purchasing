<div style="margin-top: 10px">
    <form action="{{ route('approval.reject_store', $reject->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Catatan Reject <span class="text-danger">*</span> </label>
            <textarea type="text" name="feedback" class="form-control" placeholder="-- INPUT --" required></textarea>
            <small>*tarik sisi bawah untuk panel yang lebih panjang</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
