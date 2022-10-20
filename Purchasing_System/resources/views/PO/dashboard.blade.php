@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Order')

@section('datatable')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">

@endsection
@section('title_content', 'Purchase Order')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Order</a></li>
        </ol>
    </div>
@endsection
@section('content')
<x-alert></x-alert>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<figure class="tabBlock">
  <ul class="tabBlock-tabs">
    <li class="tabBlock-tab is-active"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pause-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z"/>
      </svg> Outstanding </li>
    <li class="tabBlock-tab">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
          </svg> Closed </li>
           
  </ul>
  <div class="tabBlock-content">
    <div class="tabBlock-pane">
        <div class="card-body">
            <div class="table-responsive">

                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr class="content-control-md" align="center">

                            <td class="content-control-md" width="10%">PO</td>
                            <td class="content-control-md" width="13%">Supplier</td>
                            <td class="content-control-md" width="15%">Alamat Kirim</td>
                            <td class="content-control-md" width="10%">Pembayaran</td>
                            <td class="content-control-md" width="15%">Nama Pembuat</td>
                            <td class="content-control-md" width="17%">Tanggal Pengiriman</td>
                            <td class="content-control-md" width="15%">Status</td>
                            <td class="content-control-md" width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>




                        @foreach ($orders_pending as $item)
                            <tr align="center">

                                <td class="content-control-sm">{{ $item->no_po }}</td>
                                <td class="content-control-sm">{{ $item->nama_supplier }}</td>
                                <td class="content-control-sm">{{ $item->location->location_name }}</td>
                                <td class="content-control-sm">{{ $item->payment->name_payment }}</td>
                                <td class="content-control-sm">{{ $item->nama }}</td>
                                @if($item->tanggal_kirim != NULL)
                                <td class="content-control-sm">
                                    {{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('d/m/Y') }}
                                </td>
                                @else
                                <td class="content-control-sm">{{ $item->timeshipping->name_time }}</td>
                                @endif
                                @if($item->status == 'outstanding')
                                <td>
                                    <a class="pending content-control-sm">
                                        <i class="fa fa-clock-o"></i> {{ $item->status }}
                                    </a>
                                </td>
                                @elseif($item->status == 'closed')
                                <td>
                                    <a class="approve content-control-sm">
                                        <i class="fa fa-check"></i> {{ $item->status }}
                                    </a>
                                </td>
                                @endif
                                {{-- @foreach ($item->purchases as $value)
                                    @if ($value->status == 'outstanding')
                                        <td>
                                            <a class="pending content-control-sm">
                                                <i class="fa fa-clock-o"></i> {{ $value->status }}
                                            </a>
                                        </td>
                                    @elseif($value->status == 'closed')
                                        <td>
                                            <a class="approve content-control-sm">
                                                <i class="fa fa-check"></i> {{ $value->status }}
                                            </a>
                                        </td>
                                    @endif
                                @endforeach --}}

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
                                                <a class="dropdown-item"
                                                    href="{{ route('order.view', $item->id) }}">Detail</a>
                                                <a class="dropdown-item" 
                                                href="{{ route('order.exportPDF', $item->id) }}">Print</a>
                                                <form action="{{ route('order.destroyApp', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
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
        </div>
    </div>
    <div class="tabBlock-pane">
        <div class="card-body">
            <div class="table-responsive">

                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr class="content-control-md" align="center">

                            <td class="content-control-md" width="10%">PO</td>
                            <td class="content-control-md" width="13%">Supplier</td>
                            <td class="content-control-md" width="15%">Alamat Kirim</td>
                            <td class="content-control-md" width="10%">Pembayaran</td>
                            <td class="content-control-md" width="15%">Nama Pembuat</td>
                            <td class="content-control-md" width="17%">Tanggal Pembuatan</td>
                            <td class="content-control-md" width="15%">Status</td>
                            <td class="content-control-md" width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>




                        @foreach ($orders_success as $item)
                           
                            <tr align="center">
                                <td class="content-control-sm">{{ $item->no_po }}</td>
                                <td class="content-control-sm">{{ $item->nama_supplier }}</td>
                                <td class="content-control-sm">{{ $item->location->location_name }}</td>
                                <td class="content-control-sm">{{ $item->payment->name_payment }}</td>
                                <td class="content-control-sm">{{ $item->nama }}</td>
                                <td class="content-control-sm">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </td>
                                @if($item->status == 'outstanding')
                                <td>
                                    <a class="pending content-control-sm">
                                        <i class="fa fa-clock-o"></i> {{ $item->status }}
                                    </a>
                                </td>
                                @elseif($item->status == 'closed')
                                <td>
                                    <a class="approve content-control-sm">
                                        <i class="fa fa-check"></i> {{ $item->status }}
                                    </a>
                                </td>
                                @endif
                                {{-- @foreach ($item->purchases as $value)
                                    @if ($value->status == 'outstanding')
                                        <td>
                                            <a class="pending content-control-sm">
                                                <i class="fa fa-clock-o"></i> {{ $value->status }}
                                            </a>
                                        </td>
                                    @elseif($value->status == 'closed')
                                        <td>
                                            <a class="approve content-control-sm">
                                                <i class="fa fa-check"></i> {{ $value->status }}
                                            </a>
                                        </td>
                                    @endif
                                @endforeach --}}

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
                                                <a class="dropdown-item"
                                                    href="{{ route('order.view', $item->id) }}">Detail</a>
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
          
    
    </div>
  </div>
</figure>


   

    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
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
