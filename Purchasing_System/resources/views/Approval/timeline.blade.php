@if ($purchase_requests->approval_status == 'pending' && $purchase_requests->accept_status == 'pending')
    <li>
        <div class="timeline-badge primary"></div>
        <a class="timeline-panel text-muted" href="#">
            <span> Pending </span>
            <h6 class="mb-0"> Purchase Request belum diterima oleh tim Purchasing </strong>.
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge primary"></div>
        <a class="timeline-panel text-muted" href="#">
            <span> Pending </span>
            <h6 class="mb-0"> Purchase Request belum mendapat persetujuan dari manager divisi
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge danger">
        </div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah diajukan</h6>
            <p align="justify"> Puchase Request masuk dalam tahap pending, segera hubungi
                menager divisi untuk melakukan pengecekan dan approval</p>
        </a>
    </li>




@elseif ($purchase_requests->approval_status == 'reject' && $purchase_requests->accept_status == 'pending')
    <li>
        <div class="timeline-badge primary"></div>
        <a class="timeline-panel text-muted" href="#">
            <span> Pending </span>
            <h6 class="mb-0"> Purchase Request belum diterima oleh tim Purchasing </strong>.
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge danger"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request direject oleh manager divisi, cek catatan dan alasan reject
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge danger">
        </div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah diajukan</h6>
            <p align="justify"> Puchase Request telah diterima menager divisi</p>
        </a>
    </li>



@elseif($purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'pending')
    <li>
        <div class="timeline-badge primary"></div>
        <a class="timeline-panel text-muted" href="#">
            <span> Pending </span>
            <h6 class="mb-0"> Purchase Request belum diterima oleh tim Purchasing </strong>.
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge warning"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah mendapat persetujuan dari manager divisi
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge warning">
        </div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah diajukan</h6>
            <p align="justify"> Pengajuan Puchase Request telah disetujui, tetapi belum diterima
                oleh tim Purchasing</p>
        </a>
    </li>

    @elseif($purchase_requests->approval_status == 'edit' && $purchase_requests->accept_status == 'pending')
    <li>
        <div class="timeline-badge primary"></div>
        <a class="timeline-panel text-muted" href="#">
            <span> Pending </span>
            <h6 class="mb-0"> Purchase Request belum diterima oleh tim Purchasing </strong>.
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge warning"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah mendapat persetujuan dari manager divisi
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge warning">
        </div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah diajukan</h6>
            <p align="justify"> Pengajuan Puchase Request telah disetujui, tetapi belum diterima
                oleh tim Purchasing</p>
        </a>
    </li>



@elseif ($purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'reject')
    <li>
        <div class="timeline-badge danger"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request direject oleh tim Purchasing, cek catatan dan alasan reject
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge warning"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah mendapat persetujuan dari manager divisi
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge warning">
        </div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah diajukan</h6>
            <p align="justify"> Puchase Request telah diterima menager divisi</p>
        </a>
    </li>

    @elseif ($purchase_requests->approval_status == 'edit' && $purchase_requests->accept_status == 'reject')
    <li>
        <div class="timeline-badge danger"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request direject oleh tim Purchasing, cek catatan dan alasan reject
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge warning"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah mendapat persetujuan dari manager divisi
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge warning">
        </div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah diajukan</h6>
            <p align="justify"> Puchase Request telah diterima menager divisi</p>
        </a>
    </li>


@elseif($purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'accept')
    <li>
        <div class="timeline-badge success"></div>
        <a class="timeline-panel text-muted" href="#">
            <span> {{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}
            </span>
            <h6 class="mb-0"> Purchase Request telah diterima oleh tim Purchasing </strong>.
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge success"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah mendapat persetujuan dari manager divisi
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge success">
        </div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah diajukan</h6>
            <p align="justify"> Pengajuan Puchase Request telah disetujui semua pihak</p>
        </a>
    </li>

    @elseif($purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'accept')
    <li>
        <div class="timeline-badge success"></div>
        <a class="timeline-panel text-muted" href="#">
            <span> {{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}
            </span>
            <h6 class="mb-0"> Purchase Request telah diterima oleh tim Purchasing </strong>.
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge success"></div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah mendapat persetujuan dari manager divisi
            </h6>
        </a>
    </li>
    <li>
        <div class="timeline-badge success">
        </div>
        <a class="timeline-panel text-muted" href="#">
            <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
            <h6 class="mb-0"> Purchase Request telah diajukan</h6>
            <p align="justify"> Pengajuan Puchase Request telah disetujui semua pihak</p>
        </a>
    </li>
@endif
{{-- <li>
                                    <div class="timeline-badge danger">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>30 minutes ago</span>
                                        <h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>15 minutes ago</span>
                                        <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                    </a>
                                </li> --}}
