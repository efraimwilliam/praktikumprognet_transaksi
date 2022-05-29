@extends('layouts.admin')

<link rel="stylesheet" href="<?php echo asset('css/detailproduk.css')?>" type="text/css">
<link rel="stylesheet" href="<?php echo asset('css/commentadmin.css')?>" type="text/css">

@section('content')
<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
                    
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                        <br>
						 							<!--IMAGE BERMASALAH TOLONG PERBAIKI-->
						  <div class="tab-pane active" id="pic-1"><img src="$produk2->produk->image_name" /></div>
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
							<span class="review-no">{{$produk2->product_rate}}</span>
						</div>
						<p class="product-description">{{$produk2->description}}</p>
						<h4 class="price">current price: <span>{{$produk2->price}}</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">Stock:
							<span class="size" data-toggle="tooltip" title="small">{{$produk2->stock}}</span>
						</h5>
						<div class="action">
							<a class="btn btn-primary" href="{{ route('produk.edit', $produk2->id) }}" role="button">Edit</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>


	<!--COMMENT-->

	@foreach($comment as $com)

    <div class="container">
	<h3 class="text-riht">Review</h3>
	
	<div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-sm-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center">Order {{$com->created_at}}</p>
        	    </div>
        	    <div class="col-md-10">
        	       <div class="clearfix"></div>
                    <h4>{{$com->userkereview->name}} ({{$com->star}} Stars)</h4>
                    <p>{{$com->userkereview->alamat}}</p>
        	        <p>{{$com->content}}</p>

					<div class="container text-end">
					<p class="text-xs-right">@foreach($com->responkereview as $rep) {{$rep->content}} 
					</p>
					@endforeach
					</div>
				
					<form action="/admin/replyreview/{{$com->id}}/{{$com->id_produk}}" method="post" attribute enctype="multipart/form-data">
					@csrf
					<div class="textarea">
							<textarea class="form-control" id="review" name="review" rows="1" placeholder=" Enter Your Comment Here"></textarea>
						</div>
							<button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Submit</button>
						</form>
						</div>
        	    </div>
	        </div>

	    </div>
	</div>
</div>

	@endforeach
    @endsection