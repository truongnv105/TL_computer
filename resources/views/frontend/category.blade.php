@extends('frontend.master')
@section('title', 'Danh Mục Sản Phẩm')
@section('content')
<link rel="stylesheet" href="css/category.css">
					<div id="wrap-inner">
						<div class="products">
							<h3>{{$catename->name}}</h3>
							<div class="product-list row">
                            @foreach($items as $item)
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

						<div id="pagination">
							<ul class="pagination pagination-lg justify-content-center mt-5">
                                {{$items->links()}}
							</ul>
						</div>
                    </div>
@endsection


