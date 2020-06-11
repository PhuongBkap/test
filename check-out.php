<?php include 'header.php';

// echo "<pre>";
// print_r($cart);

if(isset($_POST['name'])){

	$add_ship = $_POST['add_ship'];
	$note =  $_POST['note'];
	$id_account = $user['id'];
	$total_price = total_price($cart);
	$sql = "INSERT INTO orders(id_account,total_price,address_ship,note) VALUES ('$id_account','$total_price','$add_ship','$note')";

	$query = mysqli_query($conn,$sql);
	$id = mysqli_insert_id($conn);
	// var_dump($id); die();

	foreach ($cart as $key => $value) {
		$price = $value['price'];
		$quantity = $value['quantity'];
		$sql_detail = mysqli_query($conn,"INSERT INTO order_detail(id_orders,id_product,price,quantity) VALUES ('$id','$key','$price','$quantity') ");
	}
	
	unset($_SESSION['cart']);
	header('location: mess.php');
	

}

 ?>
<?php if(!empty($user)) {?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin mua hàng</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
						
					
						<div class="form-group">
							<label for="">Họ tên</label>
							<input type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $user['name']?>" name="name">
						</div>
						<div class="form-group">
							<label for="">SĐT</label>
							<input type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $user['phone']?>">
						</div>
						<div class="form-group">
							<label for="">Địa chỉ</label>
							<input type="text" class="form-control" id="old_addr" placeholder="Input field" value="<?php echo $user['address']?>">
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" id="addr" >
								Gửi đến địa chỉ mặc định
							</label>
						</div>
						<div class="form-group">
							<label for="">Địa chỉ người nhận</label>
							<input type="text" class="form-control" id="new_adddr" placeholder="Input field" name="add_ship">
						</div>
						<div class="form-group">
							<label for="">Ghi chú</label>
							<textarea name="note" id="input" class="form-control" rows="3" required="required"></textarea>
						</div>
					
						<button type="submit" class="btn btn-primary">Đặt hàng</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
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
								
							</tr>
						</thead>
						<tbody>
							
							<?php $stt = 1; ?>
							<?php foreach ($cart as $key => $value):?>
								<tr>
									<td><?php echo $stt++?></td>
									<td><img src="uploads/<?php echo $value['image'] ?>" alt="" width="50px"></td>
									<td><?php echo $value['name'] ?></td>
									<td>
										
											<?php echo $value['quantity'] ?>

									</td>
									<td><?php echo $value['price'] ?></td>
									<td><?php echo number_format($value['price'] * $value['quantity']) ?></td>
									
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
			
		</div>
	</div>
</div>
<?php }else{?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Vui lòng đăng nhập để tiếp tục mua hàng</strong>
	</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form action="login.php" method="POST" role="form">
				<legend>Form title</legend>
			
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="email">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" class="form-control" id="" placeholder="Input field" name="password">
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
<?php } ?>


<?php include 'footer.php' ?>
<script>
	$("#addr").click( function(){
	   if($(this).is(':checked') ){
	   		var old_addr = $("#old_addr").val();

	   		$("#new_adddr").val(old_addr);
	   }
	});
</script>