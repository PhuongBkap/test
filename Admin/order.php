<?php include 'header.php';
	include'../config_db/connect.php';
	
	$orders = mysqli_query($connect,"SELECT orders.*, account.name as 'Name' FROM orders JOIN account ON orders.id_account = account.id");

 ?>

<div class="container">
	<div class="row">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Danh sách sản phẩm </h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Mã đơn hàng</th>
								<th>Tên khách hàng</th>
								<th>Tổng tiền</th>
								<th>Ngày đặt</th>
								<th>Trạng thái</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($orders as $key => $value): ?>
								<tr>
									<td><?php echo $value['id'] ?></td>
									<td><?php echo $value['Name'] ?></td>
									<td><?php echo $value['total_price'] ?></td>
									
									
									<td>
										<?php if($value['status'] == 0) {?>

										<span class="label bg-red">Chưa xử lý</span>
									<?php }else if($value['status'] == 1) {?>
										<span class="label bg-green">Đang xử lý</span>
									<?php } ?>
										
									<td>
										<a href="order-detail.php?id=<?php echo $value['id'] ?>" title="Xem chi tiết" class="btn btn-success"><i class="fa fa-fw fa-edit"></i></a>

										<a href="" title="Xóa danh mục" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a>
									</td>
									
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>