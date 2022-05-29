<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/payment.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/paymentbaru.css') }}" />
<!------ Include the above in your HEAD tag ---------->
          
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
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
        <i class="fa fa-user-o" aria-hidden="true"></i>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/ongkir">Cek Ongkir</a>
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


@foreach($payments as $pay)


<br>
<div class="">
<!--UPLOAD PAYMENT-->
@if($pay->status=='waiting' || $pay->status=='valid' || $pay->status=='sudah_transfer' )
@if($pay->status !='review')
<div class="toolbar hidden-print">
        <div class="text-right">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$pay->id}}"><i class="fa fa-money"></i> Upload Payment</button>
        </div>
@endif

    <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter{{$pay->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--INPUT FILE-->
                <form action="/uploadpayment/{{Auth::user()->id}}/{{$pay->id}}" method="post" attribute enctype="multipart/form-data" action="">
                @csrf
                @method('POST')
                    <input type="file" class="form-control-file" id="buktipembayaran" name="buktipembayaran"value="">
            </div>
            <div class="col-sm-6 col-xs-6">
                <img src="{{ asset($pay->bukti_pembayaran) }}"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#contohModal" id="" value="">Upload Payment</button>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!--MODAL BUTTON STATUS-->
        <div class="modal fade" id="example{{$pay->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--PICTURE-->
            </div>
            <div class="col-sm-6 col-xs-6">
                <img src="{{ asset($pay->bukti_pembayaran) }}"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    
</div>

<!---INVOCE-->

<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="">
                            <img src="" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="/dashboarduser">
                            DAGANG ARAK
                            </a>
                        </h2>
                        <div>KELOMPOK 16</div>
                        <div>(123) 456-789</div>
                        <div>kelompok16@example.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"> {{ Auth::user()->name }}</h2>
                        <div class="address">{{$pay->alamat}}</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE</h1>
                        <div class="date">Date of Invoice: {{$pay->created_at}}</div>
                        <div class="date">Due Date: {{$pay->timeout}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right"></th>
                            <th class="text-right">PRICE</th>
                            <th class="text-right">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pay->detailcheckoutkecheckout as $cek)
                        <tr>
                            <td>
                                <img width='150px' class="img-responsive menu-thumbnails" src="{{ asset($cek->produkkedetailcheckout->produkimagekeproduk->image_name) }}"/>

                            </td>
                            <td class="text-left"><h3>
                                <a target="_blank" href="/detailproduk/{{$cek->produkkedetailcheckout->id}}">
                                {{$cek->produkkedetailcheckout->produk_name}}
                                </a>
                                </h3>           
                                {{$cek->produkkedetailcheckout->description}}  
                               <span></span>
                            </td>
                            <td class="qty"></td>
                            <td class="total">Rp. {{$cek->produkkedetailcheckout->price}}</td>
                            <td class="qty">

                            <button type="button" class="btn btn-info btn-xl" data-toggle="modal" data-target="#example{{$pay->id}}">{{$pay->status}}</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Shipping</td>
                            <td>Rp. {{$pay->ongkir}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>Rp. {{$pay->total}}</td>
                        </tr>
                    </tfoot>
                </table>
                @endif

    @if($pay->status=='sampai_tujuan')
    @if($pay->status!=='reviewed')
	<!-- the comment box -->
    @foreach($pay->detailcheckoutkecheckout as $pa)
	    <form action="/uploadcomment/{{$pay->id}}/{{$pa->produkkedetailcheckout->id}}" method="post" attribute enctype="multipart/form-data">
    @endforeach
	@csrf
	<div class="container">
        <h4>Thank you for your purchase, Please leave a review</h4>
        <div class="container">
        
        <div class="rate">
        
            <input  type="radio" name="rate" id="star5" value="5" >
            <label for="star5" title="text">
                Default radio
            </label>
            <input  type="radio" name="rate" id="star4" value="4" >
            <label for="star4">
                Default radio
            </label>
            <input  type="radio" name="rate" id="star3" value="3" >
            <label  for="star3">
                Default radio
            </label>
            <input  type="radio" name="rate" id="star2" value="2" >
            <label for="star2">
                Default radio
            </label>
            <input type="radio" name="rate" id="star1" value="1" >
            <label for="star1">
                Default radio
            </label>

        </div>
        </div>
		<form role="form">
        <div class="form-group">
            <textarea class="form-control" id="review" name="comment" rows="3" placeholder=" Enter Your Comment Here"></textarea>
        </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Submit</button>
        </form>
        </div>
    @endif
    @endif
                
                @if($pay->status=='waiting')
                <div class="toolbar hidden-print">
                    <div class="text-right">
                    <form action= "/deletecheckout/{{ Auth::user()->id }}/{{$pay->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                        Cancel Order
                        </button>
                    </form>
                    </div>
                    <hr>
                </div>
                @endif
                @endforeach
                <br><br><br><br><br><br>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
</div>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>

        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
