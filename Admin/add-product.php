<?php include 'header.php';

$category = mysqli_query($connect,"SELECT * FROM category");
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$slug = $_POST['slug'];
	$status = $_POST['status'];
	$cat_id = $_POST['cat_id'];
	$price = $_POST['price'];
	$sale_price = $_POST['sale_price'];
	$dess = $_POST['dess'];

	if(isset($_FILES['file'])){
		$file = $_FILES['file'];
		$file_name = $file['name'];

		move_uploaded_file($file['tmp_name'],'../uploads/'.$file_name);
	}
	// thêm mới
	mysqli_query($conn,"INSERT INTO product(name,slug,status,cat_id,price,sale_price,dess,image) VALUES ('$name','$slug','$status','$cat_id','$price','$sale_price','$dess','$file_name')");
	header('location: product.php');
}



 ?>

<section class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm mới sản phẩm</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form" enctype="multipart/form-data">

						<div class="form-group">
							<label for="">Tên sản phẩm</label>
							<input type="text" class="form-control" id="name" placeholder="Input field" name="name" onchange="ChangeToSlug()">
						</div>
						<div class="form-group">
							<label for="">Slug</label>
							<input type="text" class="form-control" id="slug" placeholder="Input field" name="slug">
						</div>
						<div class="form-group">
							<label for="">Tên danh mục</label>
							<select name="cat_id" id="input" class="form-control" required="required">
								<option value="">----Lựa chọn danh mục sản phẩm------</option>
								<?php foreach($category as $value) :?>
								<option value="<?=$value['id']?>"><?php echo $value['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Giá sản phẩm</label>
							<input type="text" class="form-control" id="name" placeholder="Input field" name="price">
						</div>
						<div class="form-group">
							<label for="">Giá khuyến mãi</label>
							<input type="text" class="form-control" id="name" placeholder="Input field" name="sale_price">
						</div>
						
						<div class="form-group">
							<label for="">Ảnh sản phẩm</label>
							<input type="file" class="form-control" id="name" placeholder="Input field" name="file">
						</div>
						
						<div class="form-group">
							<label for="">Status</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="0">
									Ẩn
								</label>
								<label>
									<input type="radio" name="status" id="input" value="1" checked="checked">
									Hiện	
								</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="">Mô tả sản phẩm</label>
							<textarea name="dess" id="dess"></textarea>
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>

		
	</div>	
</section>

<?php include 'footer.php' ?>