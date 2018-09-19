<!DOCTYPE html>
<html>
<head>
<base href="{{asset('layout/frontend')}}/ ">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>TL Shop - @yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/home/favicon.jpg">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});

		$(document).on("change", "input#quantity", function(){
			var product_id = $(this).next("input").val();
			var qty = $(this).val();
			var tdElement = $(this).parent();
			var tdTotalPrice = tdElement.nextAll("td.total-product");

			$.ajax({
				url: "/products/get_price",
				method: "get",
				data: {id: product_id, quantity: qty},
				success: function(response){
					tdTotalPrice.children("span").text(response['total-product']);
					$("span.total-cart").text(response['total-cart']);
				},
				error: function(response){
					console.log(response)
					alert("Cannot get product's price");
				}
			});
		})
	</script>
</head>
<body>
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{asset( '/' )}}"><img src="img/home/logo1.png" style="width: 178px; height: 100px;"></a>
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>
					</h1>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div id="search-bar" class="col-md-6 col-md-offset-1">
                        <form class="navbar-form" role="search" method="get" action="{{asset('search/')}}">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <input type="text" name="result" placeholder="Nhập từ khóa ..." class="form-control" style="width:230px">
                                </div>

                                <div class="input-group-btn">
                                   <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-1x"></i></button>
                                </div>
                            </div>
                        </form>
				    </div>
                </div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
					<a href="{{asset('cart/show')}}">{{Cart::getTotalQuantity()}}</a>
				</div>
			</div>
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
                            <li class="menu-item">danh mục sản phẩm</li>
                            @foreach($categories as $cate)
							<li class="menu-item"><a href="{{asset('category/'.$cate->id.'/'.$cate->slug.'.html')}}" title="">{{$cate->name}}</a></li>
                            @endforeach
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="{{asset( '/' )}}"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset( '/' )}}"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset( '/' )}}"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset( '/' )}}"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset( '/' )}}"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset( '/' )}}"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset( '/' )}}"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="{{asset( '/' )}}"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>

							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="{{asset( '/' )}}"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>
                    </div>
                    <!-- end main -->
                    @yield('content')
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">
		<div id="footer-t">
			<div class="container">
				<div class="row">
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
						<a href="{{asset( '/' )}}"><img src="img/home/logo1.png" style="width: 178px; height: 100px;"></a>
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">TL Shop thành lập năm 2018. Chúng tôi chuyên cung cấp những sản phẩm mới nhất của các thương hiệu nổi tiếng trên thế giới như Apple, SamSung....</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 1659815298</p>
						<p>Email: linhnh@relipasoft.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, nesciunt.</p>
						<p>Address 2: Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, eligendi.</p>
					</div>
				</div>
			</div>
			<div id="footer-b">
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>TL Shop - Mang niềm vui đến cho mọi người</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2018 TL Shop. All Rights Reserved</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="{{asset( '/' )}}"><img src="img/home/scroll.png"></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>
