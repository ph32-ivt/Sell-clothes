<h2>THÔNG BÁO ĐẶT HÀNG THÀNH CÔNG</h2>
<div>
	<h3>Thông tin khách hàng</h3>
	<div>
		<p>Chào bạn </p>
		<p>Cảm ơn bạn đã mua hàng tại Shop.com</p>
	</div>
	<div>
		<p>Bạn đã đặt hàng thành công.</p>
		<p>Sản phẩm của quý khách sẽ được chuyển đến địa chỉ trong phần thông tin khách hàng trong vòng 3-4 ngày.</p>
		<p>Nhân viên giao hàng sẽ liên hệ với quý khách trước 24h để giao hàng.</p>
	</div>
</div>
<div>
	<h3>Hóa đơn mua hàng</h3>
	<table class="table table-responsive table-inverse" style="border: 3px solid red; padding: 10px">
		<thead>
			<tr>
				<th style="padding: 10px; border-bottom: 1px solid black;"><strong>Tên sản phẩm</strong></th>
				<th style="padding: 10px; border-bottom: 1px solid black;"><strong>Tên sản phẩm</strong></th>
				<th style="padding: 10px; border-bottom: 1px solid black;"><strong>Giá</strong></th>
				<th style="padding: 10px; border-bottom: 1px solid black;"><strong>Số lượng</strong></th>
				<th style="padding: 10px; border-bottom: 1px solid black;"><strong>Thành tiền</strong></th>
			</tr>
		</thead>
		<tbody>
		@foreach($cart as $item)
			<tr>
				<td style="padding: 10px; border-bottom: 1px solid black;">
					{{ $item->name }}
				</td>
				<td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">
					{{ $item->options->size }}
				</td>
				<td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">
					{{ number_format($item->price) }} VND
				</td>
				<td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">
					{{ $item->qty }}
				</td>
				<td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">
					{{ number_format($item->price * $item->qty) }} VND
				</td>
			</tr>
		@endforeach
			<tr>
				<td style="padding: 10px; text-align: center;">Tổng tiền: </td>
				<td style="padding: 10px; text-align: center;" colspan="4">{{ $total }} VND</td>
			</tr>
		</tbody>
	</table>
</div>
