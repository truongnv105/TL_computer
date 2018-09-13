@extends('frontend.master')
@section('title', 'Trang Chủ')
@section('content')
                    <div id="wrap-inner">
						<div class="products">
                            <h3>sản phẩm nổi bật</h3>
							<div class="product-list row">
                            @foreach($featured as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('storage/image/' . $item->image)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->name}}</a></p>
									<p class="price">{{number_format($item->price,0,',','.')}}</p>
									<div class="marsk">
                                    <a href="{{asset('details/'.$item->id.'/'.$item->slug.'.html')}}">Xem chi tiết</a>
									</div>
								</div>
							@endforeach
							</div>
						</div>

						<div class="products">
							<h3>sản phẩm mới</h3>
							<div class="product-list row">
                                @foreach($new as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('/storage/image/' . $item->image)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->name}}</a></p>
									<p class="price">{{number_format($item->price,0,',','.')}}</p>
									<div class="marsk">
										<a href="{{asset('details/'.$item->id.'/'.$item->slug.'.html')}}">Xem chi tiết</a>
									</div>
								</div>
                                @endforeach
							</div>
						</div>
                    </div>
@endsection

