@extends('layouts.admin')

<link href="css/homepageadmin.css" rel="stylesheet">


@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Checkout</h4>
          <div class="card-tools">
          </div>
        </div>
       
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Nama</th>
                  <th>Product</th>
                  <th>Total</th>
                  <th>Payment</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($checkout as $cek)
                <tr>
                  <td>
                    {{$cek->id}}
                  </td>
                  <td>
                    {{$cek->userkecheckout->name}}
                  </td>
                  
                  <td>
                    @foreach($cek->detailcheckoutkecheckout as $cs) 
                      {{$cs->produkkedetailcheckout->produk_name}},
                    @endforeach
                  </td>
                  <td>
                    {{$cek->total}}
                  </td>
                  <td>
                    @if($cek!=='NULL')
                      <img width='150px' class="img-responsive menu-thumbnails" src="{{ asset($cek->bukti_pembayaran) }}"/>
                    @endif
                  </td>
                  <td>
                    {{$cek->status}}
                  </td>

                  <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$cek->id}}">
                    Edit
                  </button>
                    <form action="" method="post" style="display:inline;">
                      @csrf
                    
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Delete
                      </button>                    
                    </form>
                  </td>
                </tr>
              
              
              
              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter{{$cek->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Status</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="row justify-content-center">
                      <form action="/admin/waiting/{{$cek->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Waiting</button>
                      </form>
                      <form action="/admin/valid/{{$cek->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Valid</button>
                      </form>
                      <form action="/admin/expired/{{$cek->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Expired</button>
                      </form>
                      <form action="/admin/pengiriman/{{$cek->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Pengiriman</button>
                      </form>
                      <form action="/admin/sampaitujuan/{{$cek->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Sampai Tujuan</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <script src="{{ asset('assets_admin/vendors/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets_admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets_admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets_admin/js/main.js') }}"></script>


        <script src="{{ asset('assets_admin/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('assets_admin/js/dashboard.js') }}"></script>
        <script src="{{ asset('assets_admin/js/widgets.js') }}"></script>
        <script src="{{ asset('assets_admin/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets_admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
        <script src="{{ asset('assets_admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
        <script>
            (function($) {
                "use strict";

                jQuery('#vmap').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#1de9b6',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1de9b6', '#03a9f5'],
                    normalizeFunction: 'polynomial'
                });
            })(jQuery);
        </script>

    </body>
@endsection