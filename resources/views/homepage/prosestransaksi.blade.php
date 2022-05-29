<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/payment.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/dashboarduser">Home</a></li>
        <li><a href="/payment/{{ Auth::user()->id }}">Checkout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>  {{ Auth::user()->name }}</a></li>
        <li><a href="/chart/{{Auth::user()->id}}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>
@foreach ($payments as $pay)
<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
               
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            
            <div class="row cart-body">
                    <br>
                <div class="">
                <form class="form-horizontal" action= "/deletecheckout/{{ Auth::user()->id }}/{{$pay->id}}" method="POST">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right">
                                    @csrf
                                    @method('DELETE')
                                    <button type ="submit" href='{{$pay->id}}' class="dropdown-item">Delete Post</a>
                                
                            </div>
                        </div>                      
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$pay->produkkecheckout->produk_name}}</div>
                                    <div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>Rp. </span>{{$pay->produkkecheckout->price}}</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Shipping</strong>
                                    <div class="pull-right"><span>Rp. </span><span>50</span></div>
                                </div>
                                
                            </div>
                            <p>{{$user->alamat}}</p>
                            
                            <div class="form-group"><hr /></div>
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>Rp. </span><span>{{$pay->total}}</span></div>
                                </div>
                            </div>

                            <div class="form-group"><hr /></div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Limit Waktu</strong>
                                    <div class="pull-right"><span></span>12.00<span></span></div>
                                </div>
                            </div>

                            
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Status</strong>
                                    <div class="pull-right"><span></span>{{$pay->status}}<span></span></div>
                                </div>                            
                                <div class="form-group"><hr /></div> 
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive menu-thumbnails" src="{{ asset($pay->bukti_pembayaran) }}"/>
                                </div>
                            </div>

                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Review</strong>
                                    <div class="pull-right"><span></span>
                                    
                                    {{$pay->status}}
                                    <span></span></div>
                                </div>                            
                                <div class="form-group"><hr /></div> 
                                <div class="col-sm-3 col-xs-3">
                                    <p>test</p>
                                </div>
                            </div>
                           
                            
                        </div>
                        </form>

                        <!--UPLOAD BUKTI PEMBAYARAN-->
                        <div class="modal-footer">
                        <form action="/uploadpayment/{{Auth::user()->id}}/{{$pay->id}}" class="form-horizontal" method="post" attribute enctype="multipart/form-data" action="">
                        @csrf
                        @method('POST')
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="buktipembayaran" name="buktipembayaran"value="">
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#contohModal" id="" value="">Upload Payment</button>
                            </div>
                        </form>
                        
                
                    <!--REVIEW ORDER END-->
                </div>       
                </div>
                
                
                @endforeach
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>

  
    