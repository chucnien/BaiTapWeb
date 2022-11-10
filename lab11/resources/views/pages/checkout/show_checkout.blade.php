@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			<div class="register-req">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout-customer')}}" method="POST">
									{{csrf_field()}}
									<?php
									$email = Session::get('customer_email');
									$hoten = Session::get('customer_name');
									$phone = Session::get('customer_phone');
									
									?>
									<input type="text" name="shipping_email" value="{{$email}}" placeholder="Email">
									<input type="text" name="shipping_name" value="{{$hoten}}"placeholder="Họ và tên">
									<input type="text" name="shipping_address" placeholder="Địa chỉ">
									<input type="text" name="shipping_phone" value="{{$phone}}"placeholder="Phone">
									<textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
									
									
										 <div class="form-group">
		                                    <label for="exampleInputPassword1">Chọn hình thức giao hàng</label>
		                                      <select name="shipping_method"  class="form-control input-sm m-bot15 payment_select">
		                                            <option value="0">Giao theo địa chỉ</option>
		                                            <option value="1">Nhận tại shop</option>   
		                                    </select>
		                                </div>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">

								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>

			
			
		</div>
	</section> <!--/#cart_items-->

@endsection