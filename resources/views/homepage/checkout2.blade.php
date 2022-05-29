<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('css/paymentbaru.css') }}" />
    <title>Cek Ongkir</title>
</head>
          
<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/dashboarduser">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/payment/{{ Auth::user()->id }}">Checkout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ongkir">Cek Ongkir</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
        <i class="fa fa-user-o" aria-hidden="true"></i>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
    </li>
    <li class="nav-item">
        <i class="fa fa-cart-plus" aria-hidden="true"></i>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/chart/{{Auth::user()->id}}">Chart</a>
    </li>
    </ul>

  </div>
</nav>
<!--NAVBAR-->

<!doctype html>
<html lang="en">
    <head><!-- Required meta tags -->
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS --><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>checkout</title>

</head>

<body>

<br><br>
<!-- PRODUK -->
<div class="container">
		<div class="card">
			<div class="container-fliud">
                @foreach($checkout->detailcheckoutkecheckout as $cek)
				<div class="wrapper row">
                    
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                        <br>
						 	<!--IMAGES SUDAH DIPERBAIKI-->
                          @foreach($cek->produkkedetailcheckout->images as $img)	 
						  <div class="tab-pane active" id="pic-1"><img width='300PX' class="img-thumbnail" src="{{ asset($img->image_name) }}" /></div>
						  @endforeach
						</div>
						
					</div>
					<div class="details col-md-6"><br><br><br>
						<h3 class="product-title">{{ $cek->produkkedetailcheckout->produk_name }}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no"></span>
						</div>
						<p class="product-description">{{$cek->produkkedetailcheckout->description}}</p>
						<h4 class="price">Harga : <span>Rp. {{$cek->produkkedetailcheckout->price}}</span></h4>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>



<!-- ALAMAT -->
    <div class="container">      
    <form action="/checkoutgas/{{$checkout->id}}" method="post">      
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <h3 class="mt-5 mb-5">Alamat Pengiriman</h3>
                    <div class="form-group ">
                        <label class="font-weight-bold">PROVINSI ASAL</label>
                        <select class="form-control provinsi-asal" name="province_origin">
                            <option value="1">Bali</option>
                        </select>
                    </div>
                <div class="form-group ">
                <label class="font-weight-bold">KOTA / KABUPATEN ASAL</label>
                        <select class="form-control kota-asal" name="city_origin">
                            <option value="144">Denpasar</option>
                        </select>
                </div>
                <div class="form-group ">
                    <label class="font-weight-bold">Alamat<span></span></label>
                <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Alamat Lengkap pengiriman" ></textarea>
            </div>
            
            <div class="form-group ">
            <label class="font-weight-bold">PROVINSI TUJUAN</label>
                        <select class="form-control provinsi-tujuan" name="province_destination">
                            <option value="0">-- pilih provinsi tujuan --</option>
                            @foreach ($provinces as $province => $value)
                                <option value="{{ $province }}">{{ $value }}</option>
                            @endforeach
                        </select>
            </div>
            <div class="form-group ">
            <label class="font-weight-bold">KOTA / KABUPATEN TUJUAN</label>
                        <select class="form-control kota-tujuan" name="city_destination">
                            <option value="">-- pilih kota tujuan --</option>
                        </select>
                </div>
                <div class="form-group ">
                <label class="font-weight-bold">KURIR</label>
                        <select class="form-control kurir" name="courier">
                            <option value="0">-- pilih kurir --</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    
                </div>
                <div class="form-group">
                        <label class="font-weight-bold">BERAT (GRAM)</label>
                        <input type="number" class="form-control" name="weight" id="weight" placeholder="Masukkan Berat (GRAM)">
                </div>

                <div class="form-group">
                    <button class="btn btn-md btn-primary btn-block btn-checku">CEK ONGKOS KIRIM</button>
                </div>

                <div class="form-group">
                    <label>Pilih Layanan<span>*</span></label>
                    <select name="layanan" id="ongkir" class="form-control">
                        <option value="" id="cost">Pilih layanan</option>
                    </select>
                </div>
            </div>



            
            <div class="col-md-4">
                <div class="form-group ">
                    <label>Harga Barang<span>*</span></label>
                    <input type="text" name="totalbelanja" class="form-control" value="{{$checkout->total}}" id="harbar" readonly>
                </div>
                    <!--<div class="form-group ">
                        <label>total berat (gram) </label>
                        <input class="form-control" type="text" id="weight" value="" name="weight" readonly>
                    </div>-->
                    <div class="form-group ">
                        <label>total ongkos kirim </label>
                        <input class="form-control" type="text" id="total_ongkir" name="ongkir" readonly>
                    </div>
                    <div class="form-group "><label>total keseluruhan </label>
                    
                    @csrf
                        <input class="form-control" type="text" id="totalharbar" name="total"></div><div class="form-group">
                            <button class="btn btn-primary" type="submit">Proses Order</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>


<script>
    $(document).ready(function(){
        //active select2
        $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
            theme:'bootstrap4',width:'style',
        });
        //ajax select kota asal
        $('select[name="province_origin"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_origin"]').empty();
                        $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                        $.each(response, function (key, value) {
                            //console.log(value);
                            $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
            }
        });
        //ajax select kota tujuan
        $('select[name="province_destination"]').on('change', function () {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
            }
        });
        //ajax check ongkir
 
        let isProcessing = false;
        $('.btn-checku').click(function (e) {
            e.preventDefault();

            let token            = $("meta[name='csrf-token']").attr("content");
            let city_origin      = $('select[name=city_origin]').val();
            let city_destination = $('select[name=city_destination]').val();
            let courier          = $('select[name=courier]').val();
            let weight           = $('#weight').val();

            if(isProcessing){
                return;
            }
            
            isProcessing = true;
            jQuery.ajax({
                url: "/ongkir",
                data: {
                    _token:              token,
                    city_origin:         city_origin,
                    city_destination:    city_destination,
                    courier:             courier,
                    weight:              weight,
                },
                dataType: "JSON",
                type: "POST",
                success: function (response) {
                    isProcessing = false;
                    if (response) {
                        console.log(response);
                        $.each(response, function(index, value) {
                            //console.log(value)
                            $.each(value.cost, function(ic, vc) {
                                //console.log(vc)
                                $('#ongkir').append('<option value="'+value.service.toLowerCase()+'" cost="'+vc.value+'"><strong>'+value.service+'</strong> - Rp. '+vc.value+' ('+vc.etd+' hari)</option>');
                            });
                        });
                    }
                }
            });

        });

    //AMBIL VALUE PRICE
    $('#ongkir').on('change', function(e){
        var harbar = $('#harbar').val();
        var cost = $(this).find(':selected').attr('cost');
        
        //alert($(this).find(':selected').attr('cost'));

        $('#total_ongkir').val(cost);
        $('#totalharbar').val(parseInt(harbar) + parseInt(cost));

    });


    });
</script>

</body>

