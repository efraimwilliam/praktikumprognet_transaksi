
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PRAKTIKUM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 
  
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    p{
        margin-left: 15px;
        margin-top: 10px;
    }
    .buttonbeli{
        margin-left: 12px;
        margin-top : 10px;
        margin-bottom : 10px;
    }
  </style>
</head>
<body>
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
        <li ><a href="/dashboarduser">Home</a></li>
        <li><a href="/payment/{{ Auth::user()->id }}">Checkout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>  {{ Auth::user()->name }}</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
<div class="form-check">
  <form action= "/deleteallchart/{{ Auth::user()->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type ="submit" class="dropdown-item">Delete All Chart</a>
  </form>
</div>


<div class="container">
<div class="form-check">
  

    <a href = "/chart/checkout/{{Auth::user()->id}}" class="dropdown-item">Buy All</a>

</div>




<br><br>
@foreach ($test as $cek)
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                      
                    
                        <img class="pic-1" src="{{ asset($cek->produkimagekechart->image_name) }}">
                      
                    </a>
                    <ul class="social">
                        <li><a href="/detailproduk/{{$cek->produkkeuser->id}}" data-tip="Buy"><i class="fa fa-search"></i></a></li>
                    </ul>
                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label">20%</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"></li>
                </ul>
                
                <div class="product-content">
                    <h3 class="title"><a href="/detailproduk/{{$cek->produkkeuser->id}}">{{$cek->produkkeuser->produk_name}}</a></h3>
                    <div class="price">{{$cek->produkkeuser->price}}
                        <span>$20.00</span>
                    </div>
                    <p class="card-text">{{$cek->produkkeuser->description}}</p>
                </div>
            </div>
        </div>
        @endforeach 
        
    </div>
</div>

<br>


</body>
</html>
