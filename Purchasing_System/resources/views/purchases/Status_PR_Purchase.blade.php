
    @if ($purchase_request->accept_status == 'pending')
    <div>
        <a class="pending content-control">
            <i class="fa fa-clock-o"></i> approve pending
        </a>
    </div>
   
@elseif($purchase_request->accept_status == 'accept')
    <div>
        <a class="approve content-control">
            <i class="fa fa-check"></i> accept purchasing
        </a>
    </div>
    @elseif($purchase_request->accept_status == 'edit')
    <div><a class="edit content-control">
        <i class="fa fa-check"></i>
        accept with {{ $purchase_request->accept_status . 'ed' }}
    </a></div>
    @elseif($purchase_request->accept_status == 'reject')
    <div>
        <a class="reject content-control">
            <i class="fa fa-check"></i> reject purchasing
        </a>
    </div>
@endif
