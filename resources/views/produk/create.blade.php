@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Produk</h3>
          <div class="card-tools">
            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
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
          <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- <div class="form-group"> -->
              <!-- <label for="category_id">Kategori Produk</label> -->
              <!-- <select name="category_id" id="category_id" class="form-control"> -->
                <!-- <option value="">Pilih Kategori</option> -->
                <!-- @foreach($itemkategori as $kategori) -->
                <!-- <option value="{{ $kategori->id }}">{{ $kategori->category_name }}</option> -->
                <!-- @endforeach -->
              <!-- </select> -->
            <!-- </div> -->
            <div class="form-group">
              <label for="produk_name">Nama Produk</label>
              <input type="text" name="produk_name" id="produk_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="product_rate">Rating Produk</label>
              <input type="text" name="product_rate" id="product_rate" class="form-control">
            </div>
            <div class="form-group">
              <label for="price">Harga Produk</label>
              <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="form-group">
              <label for="description">Deskripsi Produk</label>
              <textarea type="text" name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="stock">Stok</label>
                  <input type="text" name="stock" id="stock" class="form-control">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="weight">Berat(g)</label>
                  <input type="text" name="weight" id="weight" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
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