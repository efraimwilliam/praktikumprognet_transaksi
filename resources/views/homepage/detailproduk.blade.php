<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('css/detailproduk.css')?>" type="text/css">
  </head>

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
  <body>
      
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
                    
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                        <br>
						 							<!--IMAGES SUDAH DIPERBAIKI-->
						@foreach($produk2->images as $img)	 
						  <div class="tab-pane active" id="pic-1"><img src="{{ asset($img->image_name) }}" /></div>
						  @endforeach
						</div>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{ $produk2->produk_name }}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">{{$star}}</span>
						</div>
						<p class="product-description">{{$produk2->description}}</p>
						<h4 class="price">current price: <span>Rp. {{$produk2->price}}</span></h4>
						<p class="vote"><strong>80%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">Stock:
							<span class="size" data-toggle="tooltip" title="small">{{$produk2->stock}}</span>
						</h5>
						<div class="action">
						<form action="/addchart/{{ Auth::user()->id }}/{{$produk2->id}}" method="post">
						@csrf   
							<a class="btn btn-primary" href="/checkoutbiasa/{{$produk2->id}}" role="button">Buy Now</a>
							<button class="btn btn-primary" type="submit">Add to Chart</button>
						</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>


	<!--COMMENT-->

	@foreach($comment as $com)
	<div class="container">
	<div class="row">
		<div class="col-md-8">
		<h2 class="page-header">Review Product</h2>
			<section class="comment-list">
			<!-- First Comment -->
			<article class="row">
				<div class="col-md-2 col-sm-2 hidden-xs">
				<figure class="thumbnail">
					<img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />

					<!--{{ $com->userkereview->name ?? '-' }} ALTERNATIF KALO ADA DATA YANG NULL-->
					<figcaption class="text-center">{{$com->userkereview->name}}</figcaption>
				</figure>
				</div>
				<div class="col-md-10 col-sm-10">
				<div class="panel panel-default arrow left">
					<div class="panel-body">
					<header class="text-left">
						<time class="comment-date"><i class="fa fa-clock-o"></i> {{$com->updated_at}}</time>
					</header>
					<div class="comment-post">
						<p>{{$com->content}}</p>
					</div>
					<div class="text-right">
						<p class="text-right">@foreach($com->responkereview as $rep) {{$rep->content}} </p>@endforeach
					</div>
					<br>
					
				</div>
					
				</div>
				</div>
			</article>
			</section>
		</div>
	</div>
	</div>
	@endforeach
	
  </body>
</html>

