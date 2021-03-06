@extends('master')

@section('title')
	{{ "Trang chủ" }}
@endsection

@section('content')
	<div class="rev-slider">
		<div class="fullwidthbanner-container">
			<div class="fullwidthbanner">
				<div class="bannercontainer" >
					<div class="banner" >
						<ul>
							@foreach ($slide as $sl)
							<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
								<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
									<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="image/slide/{{ $sl['image'] }}" data-src="image/slide/{{ $sl['image'] }}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/{{ $sl['image'] }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
									</div>
								</div>

							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="tp-bannertimer"></div>
		</div>
	</div><!--slider-->
			
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ $newProduct->total() }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach ($newProduct as $new)
									<div class="col-sm-3">
										<div class="single-item">
											@if ($new->promotion_price > 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											
											<div class="single-item-header">
												<a href="product.html">
												<img src="image/product/{{ $new->image }}" height="250px" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{ $new->name }}</p>
												<p class="single-item-price">
												@if ($new->promotion_price > 0)
													<span class="flash-del">{{ number_format($new->unit_price) }}</span>
													<span class="flash-sale">{{ number_format($new->promotion_price) }}</span>
												@else
													<span class="flash-sale">{{ number_format($new->unit_price) }}</span>
												@endif
													
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{ route('add-cart', $new->id) }}"">
													
													<i class="fa fa-shopping-cart"></i>
												</a>
												<a class="beta-btn primary" href="{{ route('product', $new->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<div class="row">
								{{ $newProduct->links() }}
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mại</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ $saleProduct->total() }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							@php
								$count = 0;
							@endphp
							<div class="row">
								@foreach ($saleProduct as $sale)
									@php
										$count++;
									@endphp
									<div class="col-sm-3">
										<div class="single-item">
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

											<div class="single-item-header">
												<a href="product.html"><img src="image/product/{{ $sale->image }}" height="250px" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{ $sale->name }}</p>
												<p class="single-item-price">
													<span class="flash-del">{{ number_format($sale->unit_price) }}</span>
													<span class="flash-sale">{{ number_format($sale->promotion_price) }}</span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{ route('add-cart', $sale->id) }}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{ route('product', $sale->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@if ($count % 4 ==0)
										<div class="space40">&nbsp;</div>
									@endif

								@endforeach
							</div>
							<div class="row">
								{{ $saleProduct->links() }}
							</div>
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->

			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

{{-- @section('ajax')
	<script type="text/javascript">
    $(document).ready(function(){
        $('a .add-to-cart').click(function(){
            var url = $(this > '.pro-id').val();
            var success = function(result){
                $('#cart-info').html(result);
                console.log('result')
            }
            $.get(url,success);

        });            
    });

    </script>
@endsection --}}