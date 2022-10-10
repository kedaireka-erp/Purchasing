    {{-- Start 30% --}}
    @if ($purchase_request->approval_status == 'pending')
        <div>
            <a class="pending content-control-sm">
                <i class="fa fa-clock-o"></i> approve pending
            </a>
        </div>
        {{-- end 30% --}}

        {{-- Start 60% --}}
    @elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'pending')
        <div> <a class="approve content-control-sm">
                <i class="fa fa-check"></i> approved manager
            </a></div>
        <div>
            <a class="pending content-control-sm">
                <i class="fa fa-clock-o"></i> accept pending
            </a>
        </div>
    @elseif($purchase_request->approval_status == 'edit' && $purchase_request->accept_status == 'pending')
        <div><a class="edit content-control">
                <i class="fa fa-check"></i>
                approve with {{ $purchase_request->approval_status . 'ed' }}
            </a></div>
        <div>
            <a class="pending content-control-sm">
                <i class="fa fa-clock-o"></i> accept pending
            </a>
        </div>
        {{-- end 60% --}}

        {{-- Start 100% --}}
    @elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'accept')
        <div align="center"> <a class="approve content-control">
                <i class="fa fa-check"></i> done
            </a></div>
    @elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'edit')
        <div> <a class="approve content-control-sm">
                <i class="fa fa-check"></i> approved manager
            </a></div>
        <div>
            <a class="edit content-control-sm">
                <i class="fa fa-check"></i>
                accept with {{ $purchase_request->accept_status . 'ed' }}
            </a>
        </div>
        @elseif($purchase_request->approval_status == 'edit' && $purchase_request->accept_status == 'accept')
        <div><a class="edit content-control">
            <i class="fa fa-check"></i>
            approve with {{ $purchase_request->approval_status . 'ed' }}
        </a></div>
    <div>
        
            <a class="approve content-control-sm">
                <i class="fa fa-check"></i>
                {{ $purchase_request->accept_status . 'ed' }}
            </a>
        </div>
        @elseif($purchase_request->approval_status == 'edit' && $purchase_request->accept_status == 'edit')
        <div><a class="edit content-control">
                <i class="fa fa-check"></i>
                approve with {{ $purchase_request->approval_status . 'ed' }}
            </a></div>
        <div>
            <div><a class="edit content-control">
                <i class="fa fa-check"></i>
                accept with {{ $purchase_request->accept_status . 'ed' }}
            </a></div>
        {{-- End 100% --}}


        {{-- REJECT --}}
    @elseif($purchase_request->approval_status == 'reject')
        <div>
            <a class="reject content-control-sm">
                <i class="fa fa-close"></i> reject manager
            </a>
        </div>
    @elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'reject')
        <div>
            <a class="approve content-control-sm">
                <i class="fa fa-check"></i> approved manager
            </a>
        </div>
        <div>
            <a class="reject content-control-sm">
                <i class="fa fa-close"></i> reject purchasing
            </a>
        </div>
        @elseif($purchase_request->approval_status == 'edit' && $purchase_request->accept_status == 'reject')
        <div><a class="edit content-control">
            <i class="fa fa-check"></i>
            approve with {{ $purchase_request->approval_status . 'ed' }}
        </a></div>
        <div>
            <a class="reject content-control-sm">
                <i class="fa fa-close"></i> reject purchasing
            </a>
        </div>
        {{-- End REJECT --}}
    @endif
