
    @if ($purchase_request->approval_status == 'pending')
    <div>
        <a class="pending content-control">
            <i class="fa fa-clock-o"></i> approve pending
        </a>
    </div>
   
@elseif($purchase_request->approval_status == 'approve')
    <div>
        <a class="approve content-control">
            <i class="fa fa-check"></i> approved manager
        </a>
    </div>
    @elseif($purchase_request->approval_status == 'edit')
    <div><a class="edit content-control">
        <i class="fa fa-check"></i>
        approve with {{ $purchase_request->approval_status . 'ed' }}
    </a></div>
    @elseif($purchase_request->approval_status == 'reject')
    <div>
        <a class="reject content-control">
            <i class="fa fa-check"></i> reject manager
        </a>
    </div>
@endif
