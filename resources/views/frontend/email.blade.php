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
    <link rel="stylesheet" href="{{asset('layout/frontend/css/email.css')}}">
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
	</script>
</head>
<body>


					<div id="wrap-inner">
						<div id="khach-hang">
							<h3>Thông tin khách hàng</h3>
							<p>
								<span class="info">Khách hàng: </span>
								{{$info['name']}}
							</p>
							<p>
								<span class="info">Email: </span>
								{{$info['email']}}
							</p>
							<p>
								<span class="info">Điện thoại: </span>
								{{$info['phone']}}
							</p>
							<p>
								<span class="info">Địa chỉ: </span>
								{{$info['add']}}
							</p>
						</div>
						<div id="hoa-don">
							<h3>Hóa đơn mua hàng</h3>
							<table class="table table-bordered table-responsive">
                            @foreach($cart as $item)
								<tr class="bold">
									<td width="30%">{{$item->name}}</td>
									<td width="25%">{{number_format($item->price,0,',','.')}}</td>
									<td width="20%">{{$item->quantity}}</td>
									<td width="15%">{{number_format($item->price*$item->quantity,0,',','.')}}</td>
								</tr>
                            @endforeach
								<tr>
									<td colspan="3">Tổng tiền:</td>
									<td class="total-price">{{number_format($total,0,',','.')}}</td>
								</tr>
							</table>
						</div>
						<div id="xac-nhan">
							<br>
							<p test-align="justify">
								<b>Quý khách đã đặt hàng thành công!</b><br />
								• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
								• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
								<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
							</p>
						</div>
					</div>
					<!-- end main -->
</body>
</html>
