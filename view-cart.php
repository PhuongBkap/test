<?php include 'header.php';





// echo "<pre>";
// print_r($cart);

 ?>

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="panel panel-info">
				
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>ảnh sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Số lượng</th>
								<th>Đơn giá</th>
								<th>Thành tiền</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						
							<?php foreach ($cart as $key => $value):?>
								<tr>
									<td><?php echo $key ++ ?></td>
									<td><img src="uploads/<?php echo $value['image'] ?>" alt="" width="100px"></td>
									<td><?php echo $value['name'] ?></td>
									<td>
										<form action="cart.php">
											<input type="hidden" name="action" value="update">
											<input type="hidden" name="id" value="<?php echo $value['id']?>">
											<input type="text" name="quantity" value="<?php echo $value['quantity'] ?>">
											<button type="submit">Cập nhật</button>
										</form>
									</td>
									<td><?php echo $value['price'] ?></td>
									<td><?php echo number_format($value['price'] * $value['quantity']) ?></td>
									<td> <a href="cart.php?id=<?php echo $value['id'] ?>&action=delete" title="" class="btn btn-danger">Xóa</a></td>
								</tr>
							<?php endforeach ?>
							<tr>
								<td>Tổng tiền</td>
								<td colspan="6" class="text-center bg-info"> <?php echo number_format(total_price($cart)) ?>VNĐ</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><a href="check-out.php" class="btn btn-success">Đặt hàng</a></h3>
				</div>
				<div class="panel-body deess">
					
				</div>
			</div>
		</div>
	</div>
</div>


<?php include 'footer.php' ?>