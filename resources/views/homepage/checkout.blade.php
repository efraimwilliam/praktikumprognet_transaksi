<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/checkout.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
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
<br>


<body>

    <br><br>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">      
                    <div class="col-md-9 clearfix" id="basket">
                        <div class="box">
                            
                                <div class="table-responsive">
                                    <table class="table">
                                        <?php
                                            $a = (int)$produk->price;
                                            $b = 50;
                                            $total = $a + $b; 
                                        ?>
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th colspan="2"></th>
                                                <th colspan="2">Price</th>
                                            </tr>
                                        </thead>


                                  
                                        <form action="/checkoutgas/{{ Auth::user()->id }}/{{$produk->id}}" method="post"> 
                                        @csrf
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="">

                                                    <!--IMAGE BERMASALAH TOLONG PERBAIKI-->
                                                        <img src="$produk2->produk->image_name" alt="FOTO PRODUK" width="250" height="250">
                                                    </a>
                                                </td>
                                                <td><p>{{$produk->produk_name}}</p>
                                                    <p>ATAS NAMA : {{ Auth::user()->name }}</p>
                                                </td>
                                                <!-- MASUKIN NOTE BISA DISINI -->
                                                <th colspan="2"></th>
                                                <td>Rp. {{$produk->price}}</td>
                                                <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Alamat</th>
                                                <th colspan="6"></th>
                                            </tr>
                                            <td><h4>{{ Auth::user()->name }}</h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                    placeholder="Enter your Address" value="{{$user->alamat}}">
                                                </div>
                                                <th colspan="5"></th>
                                            <tr>
                                                <th colspan="5">Shiping</th>
                                                <th colspan="5"></th>
                                            </tr>
                                            <td>
                                            <select class="form-control">
                                                <option>Sicepat</option>
                                                </select>
                                                <th colspan="5"></th>
                                            </td>
                                             <tr>
                                                <th colspan="5">Shipping Cost</th>
                                                <th colspan="2">Rp. 50</th>
                                            </tr>
                                            
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th colspan="2">Rp. <?php echo $total;?></th>
                                                
                                        <input type="hidden" id="name_id" name="total" value="<?php echo $total;?>">
                                            </tr>
                                            
                                        </tfoot>

      

                                    <a href="/checkoutgas/{{ Auth::user()->id }}/{{$produk->id}}">Order Now</a>
                                   
                                    </table>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="" value="">Order Now</button>
                                        </div>
                                    </form>

                                </div>
                           
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.content -->                                
                    
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

       



    </div>
    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>

    



</body>

</html>