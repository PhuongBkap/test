<?php include 'header.php';
	
	$product = mysqli_query($connect,"SELECT product.*, category.name as 'CateName' FROM product JOIN category ON product.cat_id = category.id");

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
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th>Danh mục</th>
								<th>Ảnh sản phẩm</th>
								<th>Trạng thái</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($product as $key => $value) {?>
								<tr>
									<td><?php echo $key + 1 ?></td>
									<td><?php echo $value['name'] ?></td>
									<td><?php echo $value['CateName'] ?></td>
									<td><img src="../uploads/<?php echo $value['image']  ?>" alt="" width = "50px"></td>
									
									<td><?php echo (($value['status'] == 0)? '<span class="label bg-red">Ẩn</span>' : '<span class="label bg-green">Hiện</span>') ?></td>
									<td>
										<a href="" title="Sửa danh mục" class="btn btn-success"><i class="fa fa-fw fa-edit"></i></a>

										<a href="" title="Xóa danh mục" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a>
									</td>
									
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>