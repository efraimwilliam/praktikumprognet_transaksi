@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">    
        <div class="card-header">
          <h4 class="card-title">Detail Kategori</h4>
          <div class="card-tools">
            <a href="{{ route('detail.create') }}" class="btn btn-sm btn-primary">
              Baru
            </a>
          </div>
        </div>
        
        <div class="card-body">
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Id Kategori</th>
                  <th>Id Produk</th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemshare as $produk)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td> 
                  <td>
                  {{ $produk->category_name }}
                  </td>
                  <td>
                  {{ $produk->produk_name }}
                  </td>
                  <td>
                    <a href="{{ route('detail.edit', $produk->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('detail.destroy', $produk->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $itemdetail->links() }}
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

    </html>
    @endsection