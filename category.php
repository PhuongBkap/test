<?php include 'header.php';
	
	if(isset($_GET['san-pham'])){
		$slug = $_GET['san-pham'];
		$category = mysqli_query($conn,"SELECT * FROM category WHERE slug = '$slug'");
		$cate = mysqli_fetch_assoc($category);
		// var_dump($cate);
		$id_cate = $cate['id'];
		$product = mysqli_query($conn,"SELECT * FROM product WHERE cat_id = '$id_cate'");

		// var_dump($product);
	}

 ?>

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Sản phẩm theo danh mục : <?php echo $cate['name'] ?>  <span class="badge badge-primary badge-pill"><?php echo (mysqli_num_rows($product)) ?></span></h3>
				</div>
				<div class="panel-body">
					<?php foreach($product as $value) {?>
						<div class="col-md-3">
							<div class="thumbnail">
								<img src="uploads/<?php echo $value['image'] ?>" alt="">
								<div class="caption">
									<h3>Title</h3>
									<p>
										...
									</p>
									<p>
										<a href="#" class="btn btn-primary">Action</a>
										<a href="#" class="btn btn-default">Action</a>
									</p>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include 'footer.php' ?>