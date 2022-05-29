@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk</h4>
          <div class="card-tools">
            <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary">
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
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Rating</th>
                  <th>Stok</th>
                  <th>Berat(g)</th>
                  <th>Foto</th>                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($item as $produk)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td> 
                  <td>
                  {{ $produk->produk_name }}
                  </td>
                  <td>
                  {{ number_format($produk->price, 2) }}
                  </td>
                  <td>
                  {{ $produk->description }}
                  </td>
                  <td>
                  {{ $produk->product_rate }}
                  </td>
                  <td>
                  {{ $produk->stock }}
                  </td> 
                  <td>  
                  {{ number_format($produk->weight, 2) }}
                  </td>
                  <td>
                  @if ($produk->image_name != 0) 
                    @foreach($produk->images as $img)
                      <img src="{{ asset($img->image_name) }}" width='150px' class="img-thumbnail">
                      @endforeach
                      <div class="col col-lg-3 col-md-3 mb-2">
                          <form action="{{ url('/admin/produkimage/'.$produk->id_image) }}" method="post" style="display:inline;">
                              @csrf
                              {{ method_field('delete') }}
                              <button type="submit" class="btn btn-sm btn-danger mb-2">
                              Hapus
                              </button>                    
                          </form>
                          </div>
                  @endif
                  
                  <div class="form-group">
                        <form action="/admin/produkimagedd/{{$produk->id}}" method="post" enctype="multipart/form-data" class="form-inline">
                        @csrf
                            <div class="form-group">
                                <input type="file" name="image" id="image">
                                <input type="hidden" name="id" value={{ $produk->id }}>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                        </td>  
                    </td>
                    <td>
                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                    <!-- Large modal -->
                    <a href="/admin/comment/{{$produk->id}}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Comment
                    </a>
                   

                </tr>
                @endforeach
              </tbody>
            </table>
            {!! $item->render() !!}          
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