@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Kurir</h4>
          <div class="card-tools">
            <a href="{{ route('courier.create') }}" class="btn btn-sm btn-primary">
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
          @if(count($errors) > 0)
            @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Kurir</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemcourier as $kategori)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td>
                  <td>
                  {{ $kategori->courier }}
                  </td>

                  <td>
                    <a href="{{ route('courier.edit', $kategori->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('courier.destroy', $kategori->id) }}" method="post" style="display:inline;">
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
            {{ $itemcourier->links() }}
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