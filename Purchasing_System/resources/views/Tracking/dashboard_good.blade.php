@extends('layout.sidebar')

@section('judul-laman', 'Tracking Other Good')

@section('datatable')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">

@endsection
@section('title_content', 'Request Tracking')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request Tracking</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Other Good</a></li>
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
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
          </svg> Finish </li>
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
                        <tr align="center">
                            <td width="5%" class="content-control-md"> PO </td>
                            <td width="15%" class="content-control-md"> Nomor PR </td>
                            <td width="10%" class="content-control-md">Deadline Date</td>
                            <td width="10%" class="content-control-md">Nama Barang</td>
                            <td width="10%" class="content-control-md">Outstanding</td>
                            <td width="10%" class="content-control-md">Sudah Datang</td>
                            <td width="10%" class="content-control-md">Requester</td>
                            <td width="10%" class="content-control-md">Divisi</td>
                            <td width="15%" class="content-control-md">status</td>
                            <td width="5%" class="content-control-md"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items_pending as $no => $item)
                            <tr align="center">
                                <td class="content-control-sm" align="center">{{ $item->no_po }}</td>
                                <td class="content-control-sm" align="center">{{ $item->no_pr }}</td>
                                <td class="content-control-sm">
                                    {{ \Carbon\Carbon::parse($item->deadline_date)->format('d/m/Y') }}
                                </td>
                                <td class="content-control-sm" align="center">{{ $item->item_name }}</td>
                                <td class="content-control-sm" align="center">{{ $item->outstanding }}</td>
                                <td class="content-control-sm" align="center">{{ $item->sudah_datang }}</td>
                                <td class="content-control-sm" align="center">{{ $item->requester }}</td>
                                <td class="content-control-sm" align="center">{{ $item->divisi }}</td>
                                @if ($item->status == 'outstanding')
                                    <td>
                                        <a class="pending content-control-sm">
                                            <i class="fa fa-clock-o"></i> {{ $item->status }}
                                        </a>
                                    </td>
                                @elseif($item->status == 'closed')
                                    <td>
                                        <a class="approve content-control-sm">
                                            <i class="fa fa-check"></i> {{ 'PO '.$item->status }}
                                        </a>
                                    </td>
                                @endif
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
                                                @if($item->outstanding == 0)
                                                <a class="dropdown-item"
                                                    href="{{ route('tracking.detail', $item->id) }}">Ubah Status</a>
                                                @else
                                                <a class="dropdown-item"
                                                    href="{{ route('tracking.detail', $item->id) }}">Ubah Outstanding</a>
                                                @endif
                                                {{-- <form action="/" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                </form> --}}
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
                        <tr align="center">
                            <td width="5%" class="content-control-md"> PO </td>
                            <td width="15%" class="content-control-md"> Nomor PR </td>
                            <td width="10%" class="content-control-md">No Surat Jalan</td>
                            <td width="15%" class="content-control-md"> Tanggal Datang </td>
                            <td width="10%" class="content-control-md">Nama Barang</td>
                            <td width="10%" class="content-control-md">Requester</td>
                            <td width="10%" class="content-control-md">Divisi</td>
                            <td width="15%" class="content-control-md">status</td>
                            <td width="5%" class="content-control-md"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items_success as $no => $item)
                            <tr align="center">
                                <td class="content-control-sm" align="center">{{ $item->no_po }}</td>
                                <td class="content-control-sm" align="center">{{ $item->no_pr }}</td>
                                <td class="content-control-sm" align="center">{{ $item->nomor_jalan }}</td>
                                <td class="content-control-sm">
                                    {{ \Carbon\Carbon::parse($item->tanggal_kedatangan_barang)->format('d/m/Y') }}
                                </td>
                                <td class="content-control-sm" align="center">{{ $item->item_name }}</td>
                                <td class="content-control-sm" align="center">{{ $item->requester }}</td>
                                <td class="content-control-sm" align="center">{{ $item->divisi }}</td>
                                @if ($item->status == 'outstanding')
                                    <td>
                                        <a class="pending content-control-sm">
                                            <i class="fa fa-clock-o"></i> {{ $item->status }}
                                        </a>
                                    </td>
                                @elseif($item->status == 'closed')
                                    <td>
                                        <a class="approve content-control-sm">
                                            <i class="fa fa-check"></i> {{ 'PO '.$item->status }}
                                        </a>
                                    </td>
                                @endif
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
                                                @if($item->outstanding == 0)
                                                <a class="dropdown-item"
                                                    href="{{ route('tracking.detail', $item->id) }}">Ubah Status PO</a>
                                                @else
                                                <a class="dropdown-item"
                                                    href="{{ route('tracking.detail', $item->id) }}">Ubah Outstanding</a>
                                                @endif
                                                {{-- <form action="/" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                </form> --}}
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
                        <tr align="center">
                            <td width="5%" class="content-control-md"> PO </td>
                            <td width="15%" class="content-control-md"> Nomor PR </td>
                            <td width="10%" class="content-control-md">No Surat Jalan</td>
                            <td width="15%" class="content-control-md"> Tanggal Datang </td>
                            <td width="10%" class="content-control-md">Nama Barang</td>
                            <td width="10%" class="content-control-md">Requester</td>
                            <td width="10%" class="content-control-md">Divisi</td>
                            <td width="15%" class="content-control-md">status</td>
                            <td width="5%" class="content-control-md"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items_done as $no => $item)
                            <tr align="center">
                                <td class="content-control-sm" align="center">{{ $item->no_po }}</td>
                                <td class="content-control-sm" align="center">{{ $item->no_pr }}</td>
                                <td class="content-control-sm" align="center">{{ $item->nomor_jalan }}</td>
                                <td class="content-control-sm">
                                    {{ \Carbon\Carbon::parse($item->tanggal_kedatangan_barang)->format('d/m/Y') }}
                                </td>
                                <td class="content-control-sm" align="center">{{ $item->item_name }}</td>
                                <td class="content-control-sm" align="center">{{ $item->requester }}</td>
                                <td class="content-control-sm" align="center">{{ $item->divisi }}</td>
                                @if ($item->status == 'outstanding')
                                    <td>
                                        <a class="pending content-control-sm">
                                            <i class="fa fa-clock-o"></i> {{ $item->status }}
                                        </a>
                                    </td>
                                @elseif($item->status == 'closed')
                                    <td>
                                        <a class="approve content-control-sm">
                                            <i class="fa fa-check"></i> {{ 'PO '.$item->status }}
                                        </a>
                                    </td>
                                @endif
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
                                                    href="{{ route('tracking.detail', $item->id) }}">Detail</a>
                                                {{-- <form action="/" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                </form> --}}
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


    {{-- <div class="card">
        <div id="chead">
            <div class="row">
                <div class="col-9">
                    <div class="card-header">
                        <h4 class="card-title">Data Request Tracking PR</h4>
                    </div>
                </div>



            </div>
            <hr>
        </div>


        {{-- <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr class="content-control" align="center">
                            <td> Nomor PO </td>
                            <td> Nomor PR </td>
                            <td>Deadline Date</td>
                            <td>Nama Barang</td>
                            <td>Outstanding</td>
                            <td>Sudah Datang</td>
                            <td>Requester</td>
                            <td>Divisi</td>
                            <td>status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($items as $no => $item)
                            <tr align="center">
                                <td></td>
                                <td class="content-control-sm" align="center">{{ $item->no_pr }}</td>
                                <td class="content-control-sm" align="center">{{ $item->deadline_date }}</td>
                                <td class="content-control-sm" align="center">{{ $item->item_name }}</td>
                                <td class="content-control-sm" align="center">{{ $item->outstanding }}</td>
                                <td class="content-control-sm" align="center">{{ $item->sudah_datang }}</td>
                                <td class="content-control-sm" align="center">{{ $item->requester }}</td>
                                <td class="content-control-sm" align="center">{{ $item->divisi }}</td>
                                @if ($item->status == 'outstanding')
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
                                                <a class="dropdown-item"
                                                    href="{{ route('tracking.detail', $item->id) }}">Tinjau</a>
                                                <form action="/" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item text-danger">Delete</button>
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

        </div> --}}
    {{-- </div> --}}




    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

    <!-- Datatable -->
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
