{{-- Start 30% --}}
@if ($purchase_request->approval_status == 'pending' && $purchase_request->accept_status == 'pending')
    <div class="progress-bar bg-warning progress-animated" style="width: 30%; height:18px;" role="progressbar"> 1/3 </div>
@elseif($purchase_request->approval_status == 'pending' && $purchase_request->accept_status == 'accept')
    <div class="progress-bar bg-warning progress-animated" style="width: 30%; height:18px;" role="progressbar"> 1/3 </div>
    {{-- end 30% --}}

    {{-- Start 60% --}}
@elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'pending')
    <div class="progress-bar bg-warning progress-animated" style="width: 60%; height:18px;" role="progressbar"> 2/3
    </div>
@elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'accept')
    <div class="progress-bar bg-warning progress-animated" style="width: 60%; height:18px;" role="progressbar"> 2/3
    </div>
    {{-- end 60% --}}

    {{-- Start 100% --}}
@elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'accept')
    <div class="progress-bar bg-success progress-animated" style="width: 100%; height:18px;" role="progressbar"> done !
    </div>
    {{-- End 100% --}}

    {{-- DANGER --}}
@elseif($purchase_request->approval_status == 'reject' && $purchase_request->accept_status == 'pending')
    <div class="progress-bar bg-danger progress-animated" style="width: 60%; height:18px;" role="progressbar"> reject !
    </div>
@elseif($purchase_request->approval_status == 'reject' && $purchase_request->accept_status == 'accept')
    <div class="progress-bar bg-danger progress-animated" style="width: 60%; height:18px;" role="progressbar"> reject !
    </div>
@elseif($purchase_request->approval_status == 'reject' && $purchase_request->accept_status == 'reject')
    <div class="progress-bar bg-danger progress-animated" style="width: 60%; height:18px;" role="progressbar"> reject !
    </div>





    {{-- Danger 2 --}}
@elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'reject')
    <div class="progress-bar bg-danger progress-animated" style="width: 100%; height:18px;" role="progressbar"> reject !
    </div>
@endif
