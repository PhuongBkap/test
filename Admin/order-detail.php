<?php include 'header.php';
include'../config_db/connect.php';
include '../cart-function.php';
if(isset($_GET['id'])){
	$id_order = $_GET['id'];
	$order_query = mysqli_query($connect,"SELECT * FROM orders WHERE id = $id_order");
	$order = mysqli_fetch_assoc($order_query);
	$id_account = $order['id_account'];
	$account_query = mysqli_query($conn,"SELECT * FROM account WHERE id = $id_account");
	// var_dump($account_query);
	// die();
	// Lấy ra danh sách sản phẩm trong đơn hàng

	$product = mysqli_query($connect,"SELECT order_detail.id_orders,order_detail.price,order_detail.quantity,product.image,product.name FROM order_detail JOIN product ON order_detail.id_product = product.id WHERE order_detail.id_orders = $id_order");
	$account = mysqli_fetch_assoc($account_query);
}

if(isset($_POST['status'])){
	$status = $_POST['status'];

	mysqli_query($conn,"UPDATE orders SET status = '$status' WHERE id = $id_order");
	header('location: order.php');
}

 ?>

<div class="container">
	<div class="row">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Thông tin khách hàng</h3>
			</div>
			<div class="panel-body text-left">
				<p>Tên khách hàng: <?php echo $account['name'] ?></p>
				<p>Số điện thoại: <?php echo $account['phone'] ?></p>
				<p>Địa chỉ nhận hàng: <?php echo $order['address_ship'] ?></p>
				<p>Ghi chú: <?php echo $order['note'] ?></p>
				<p>Ngày đặt hàng: <?php echo $order['created_at'] ?></p>

				<p>Trạng thái đơn hàng: 
					<?php if($order['status'] == 0) {?>
					chưa xử lý
					<?php }elseif($order['status'] == 1) {?>
					Đang xử lý
					<?php }elseif($order['status'] == 2) {?>
					Đang giao hàng
					<?php }elseif($order['status'] == 3) {?>
					Thành công
					<?php }else{ ?>
					Hủy đơn
					<?php } ?>

				</p>

			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Danh sách đơn hàng</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th>Ảnh</th>
								<th>Số lượng</th>
								<th>Giá </th>
								<th>Thành tiền</th>
								
							</tr>
						</thead>
						<tbody>
							<?php foreach ($product as $key => $value): ?>
								<tr>
									<td><?php echo $key+1 ?></td>
									<td><?php echo $value['name'] ?></td>
									<td><img src="../uploads/<?php echo $value['image'] ?>" alt="" width="50px"></td>
									<td><?php echo $value['quantity'] ?></td>
									<td><?php echo $value['price'] ?></td>
									<td><?php echo $value['price'] * $value['quantity'] ?></td>
								</tr>
							<?php endforeach ?>
							<tr class="bg-danger">
								<td>Tổng tiền</td>
								<td colspan="5"><?php echo total_price($product) ?></td>

							</tr>
							
						</tbody>
					</table>
				</div>
				<form action="" method="POST" class="form-inline" role="form">
					
						<div class="form-group">
							<label class="sr-only" for="">Trạng thái</label>
							<select name="status" id="input" class="form-control" required="required">
								<option value="0">Chưu Xử lý</option>
								<option value="1">Đã xử lý</option>
								<option value="2">Đang Giao hàng</option>
								<option value="3">Đã hoàn thành</option>
								<option value="4">Hủy</option>
							</select>
						</div>
					
						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</form>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>