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
        {{-- end 60% --}}

        {{-- Start 100% --}}
    @elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'accept')
        <div align="center"> <a class="approve content-control">
                <i class="fa fa-check"></i> done
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
        {{-- End REJECT --}}
    @endif
