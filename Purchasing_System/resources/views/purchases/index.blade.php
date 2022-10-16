@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Request')

@section('datatable')
    {{-- Style Datatable --}}
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    
@endsection


@section('title_content', 'Purchase Request')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Request</a></li>
        </ol>
    </div>
@endsection

@section('content')
    {{-- @include('sweetalert::alert') --}}
    <x-alert></x-alert>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<figure class="tabBlock">
  <ul class="tabBlock-tabs">
    <li class="tabBlock-tab is-active"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pause-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z"/>
      </svg> On Progress </li>
    <li class="tabBlock-tab">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
          </svg> Done </li>
           <li class="tabBlock-tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg> Reject </li>
  </ul>
  <div class="tabBlock-content">
    <div class="tabBlock-pane">
        {{-- <div class="card"> --}}
            {{-- <div id="chead">
                <div class="row">
                    <div class="col-9">
                        <div class="card-header">
                            <h4 class="card-title">PR Pending</h4>
                        </div>
                    </div>
                    <div class="col-3">
                        
                    </div>
                </div>
                <hr>
            </div>
     --}}
    
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="width:100%">
                        <thead>
                            <tr class="content-control-md" align="center">
                                <td width="15%" align="left">Nomor PR</td>
                                <td width="10%">Pengajuan</td>
                                <td width="10%">Deadline</td>
                                <td width="20%">Requester</td>
                                <td width="10%">Divisi</td>
                                <td width="10%">Type</td>
                                <td width="20%" align="center">Status</td>
                                <td width="5%" align="center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase_requests_pending as $no => $purchase_request)
                                <tr align="center">
                                    <input type="hidden" class="delete_id" value="{{ $purchase_request->id }}">
                                    <td class="content-control" align="left">{{ $purchase_request->no_pr }}</td>
                                    <td class="content-control">
                                        {{ \Carbon\Carbon::parse($purchase_request->created_at)->format('d/m/Y') }}</td>
                                    <td class="content-control">
                                        {{ \Carbon\Carbon::parse($purchase_request->deadline_date)->format('d/m/Y') }}</td>
                                    <td class="content-control">{{ $purchase_request->requester }}</td>
                                    <td class="content-control">{{ $purchase_request->Prefixe->divisi }}</td>
                                    <td class="content-control">{{ $purchase_request->type }}</td>
                                    <td class="content-control" align="left">
                                        @include('purchases.status')
                                    </td>
    
                                    <td class="py-2 text-end">
                                        <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp"
                                                type="button" id="order-dropdown-1" data-bs-toggle="dropdown"
                                                data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                                        viewbox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24">
                                                            </rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2">
                                                            </circle>
                                                        </g>
                                                    </svg></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0"
                                                aria-labelledby="order-dropdown-1">
                                                <div class="py-2">
                                                    <form action="{{ route('purchase_request.view', $purchase_request->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('GET')
                                                        <input type="submit" class="dropdown-item" value="Detail">
                                                    </form>
                                                    @if ($purchase_request->approval_status == 'pending' && $purchase_request->accept_status == 'pending')
                                                        <form
                                                            action="{{ route('purchase_request.edit', $purchase_request->id) }}"
                                                            method="GET">
                                                            @csrf
                                                            @method('GET')
                                                            <input type="submit" class="dropdown-item" value="Edit PR">
                                                        </form>
                                                        <form
                                                            action="{{ route('purchase_request.destroy', $purchase_request->id) }}"
                                                            method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item text-danger">Delete</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    <div class="tabBlock-pane">
        {{-- <div class="card"> --}}
            {{-- <div id="chead">
                <div class="row">
                    <div class="col-9">
                        <div class="card-header">
                            <h4 class="card-title">PR Done</h4>
                        </div>
                    </div>
                    <div class="col-3">
    
                    </div>
                </div>
                <hr>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="width:100%">
                        <thead>
                            <tr class="content-control-md" align="right">
                                <td width="15%" align="left">Nomor PR</td>
                                <td width="10%">Pengajuan</td>
                                <td width="10%">Deadline</td>
                                <td width="20%">Requester</td>
                                <td width="10%">Divisi</td>
                                <td width="10%">Type</td>
                                <td width="20%" align="center">Status</td>
                                <td width="5%" align="center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase_requests as $no => $purchase_request)
                                <tr align="right">
                                    <td class="content-control" align="left">{{ $purchase_request->no_pr }}</td>
                                    <td class="content-control">
                                        {{ \Carbon\Carbon::parse($purchase_request->created_at)->format('d/m/Y') }}</td>
                                    <td class="content-control">
                                        {{ \Carbon\Carbon::parse($purchase_request->deadline_date)->format('d/m/Y') }}</td>
                                    <td class="content-control">{{ $purchase_request->requester }}</td>
                                    <td class="content-control">{{ $purchase_request->Prefixe->divisi }}</td>
                                    <td class="content-control">{{ $purchase_request->type }}</td>
                                    <td class="content-control" align="left">
                                        @include('purchases.status')
                                    </td>
    
                                    <td class="py-2 text-end">
                                        <div class="dropdown text-sans-serif"><button
                                                class="btn btn-primary tp-btn-light sharp" type="button"
                                                id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport"
                                                aria-haspopup="true" aria-expanded="false"><span><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                        height="18px" viewbox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24">
                                                            </rect>
                                                            <circle fill="#000000" cx="5" cy="12"
                                                                r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="19" cy="12"
                                                                r="2">
                                                            </circle>
                                                        </g>
                                                    </svg></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0"
                                                aria-labelledby="order-dropdown-1">
                                                <div class="py-2">
    
                                                    <form action="{{ route('purchase_request.view', $purchase_request->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('GET')
                                                        <input type="submit" class="dropdown-item" value="Detail">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
        </div>
    
    </div>
    <div class="tabBlock-pane">
        {{-- <div class="card">
            <div id="chead">
                <div class="row">
                    <div class="col-9">
                        <div class="card-header">
                            <h4 class="card-title">PR Reject</h4>
                        </div>
                    </div>
                    <div class="col-3">
    
                    </div>
                </div>
                <hr>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="width:100%">
                        <thead>
                            <tr class="content-control-md" align="right">
                                <td width="15%" align="left">Nomor PR</td>
                                <td width="10%">Pengajuan</td>
                                <td width="10%">Deadline</td>
                                <td width="20%">Requester</td>
                                <td width="10%">Divisi</td>
                                <td width="10%">Type</td>
                                <td width="20%" align="center">Status</td>
                                <td width="5%" align="center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase_requests_reject as $no => $purchase_request)
                                <tr align="right">
                                    <td class="content-control" align="left">{{ $purchase_request->no_pr }}</td>
                                    <td class="content-control">
                                        {{ \Carbon\Carbon::parse($purchase_request->created_at)->format('d/m/Y') }}</td>
                                    <td class="content-control">
                                        {{ \Carbon\Carbon::parse($purchase_request->deadline_date)->format('d/m/Y') }}</td>
                                    <td class="content-control">{{ $purchase_request->requester }}</td>
                                    <td class="content-control">{{ $purchase_request->Prefixe->divisi }}</td>
                                    <td class="content-control">{{ $purchase_request->type }}</td>
                                    <td class="content-control" align="left">
                                        @include('purchases.status')
                                    </td>
    
                                    <td class="py-2 text-end">
                                        <div class="dropdown text-sans-serif"><button
                                                class="btn btn-primary tp-btn-light sharp" type="button"
                                                id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport"
                                                aria-haspopup="true" aria-expanded="false"><span><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                        height="18px" viewbox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24">
                                                            </rect>
                                                            <circle fill="#000000" cx="5" cy="12"
                                                                r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="12" cy="12"
                                                                r="2">
                                                            </circle>
                                                            <circle fill="#000000" cx="19" cy="12"
                                                                r="2">
                                                            </circle>
                                                        </g>
                                                    </svg></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0"
                                                aria-labelledby="order-dropdown-1">
                                                <div class="py-2">
                                                    <form
                                                        action="{{ route('purchase_request.view_reject', $purchase_request->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('GET')
                                                        <input type="submit" class="dropdown-item" value="Detail Reject">
                                                    </form>
                                                    <form
                                                        action="{{ route('purchase_request.destroy', $purchase_request->id) }}"
                                                        method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">Delete
                                                            PR</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
        </div>
    
    
    </div>
  </div>
</figure>

   

   

  


    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $('.btndelete').click(function (e) {
                    e.preventDefault();
    
                    var deleteid = $(this).closest("tr").find('.delete_id').val();
    
                    swal({
                            title: "Apakah anda yakin?",
                            text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
    
                                var data = {
                                    "_token": $('input[name=_token]').val(),
                                    'id': deleteid,
                                };
                                $.ajax({
                                    type: "DELETE",
                                    url: 'purchase_request/destroy/' + deleteid,
                                    data: data,
                                    success: function (response) {
                                        swal(response.status, {
                                                icon: "success",
                                            })
                                            .then((result) => {
                                                location.reload();
                                            });
                                    }
                                });
                            }
                        });
                });
    
            });
    
        </script> --}}

<script>
    var TabBlock = {
  s: {
    animLen: 200
  },
  
  init: function() {
    TabBlock.bindUIActions();
    TabBlock.hideInactive();
  },
  
  bindUIActions: function() {
    $('.tabBlock-tabs').on('click', '.tabBlock-tab', function(){
      TabBlock.switchTab($(this));
    });
  },
  
  hideInactive: function() {
    var $tabBlocks = $('.tabBlock');
    
    $tabBlocks.each(function(i) {
      var 
        $tabBlock = $($tabBlocks[i]),
        $panes = $tabBlock.find('.tabBlock-pane'),
        $activeTab = $tabBlock.find('.tabBlock-tab.is-active');
      
      $panes.hide();
      $($panes[$activeTab.index()]).show();
    });
  },
  
  switchTab: function($tab) {
    var $context = $tab.closest('.tabBlock');
    
    if (!$tab.hasClass('is-active')) {
      $tab.siblings().removeClass('is-active');
      $tab.addClass('is-active');
   
      TabBlock.showPane($tab.index(), $context);
    }
   },
  
  showPane: function(i, $context) {
    var $panes = $context.find('.tabBlock-pane');
   
    // Normally I'd frown at using jQuery over CSS animations, but we can't transition between unspecified variable heights, right? If you know a better way, I'd love a read it in the comments or on Twitter @johndjameson
    $panes.slideUp(TabBlock.s.animLen);
    $($panes[i]).slideDown(TabBlock.s.animLen);
  }
};

$(function() {
  TabBlock.init();
});

</script>


@endsection
