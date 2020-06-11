<?php 

include 'header.php';

$category = mysqli_query($conn,"SELECT * FROM category WHERE status = 1");

$new_product = mysqli_query($conn,"SELECT * FROM product WHERE status = 1 ORDER BY id DESC LIMIT 6");

?>


		<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-id" data-slide-to="0" class=""></li>

				<li data-target="#carousel-id" data-slide-to="1" class="active"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item">
					<img src="uploads/thietkehaithanh-banner1.jpg" alt="">
					
				</div>
				<div class="item active">
					<img src="uploads/banner3.jpg" alt="">
					
				</div>
				
			</div>
			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Danh mục</h3>
						</div>
						<div class="panel-body">
							<div class="list-group">
								<?php foreach ($category as $key => $value): ?>
									<a href="category.php?san-pham=<?php echo $value['slug'] ?>" class="list-group-item"><?php echo $value['name'] ?></a>
								<?php endforeach ?>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Sản phẩm mới nhât</h3>
						</div>
						<div class="panel-body">
							<?php foreach ($new_product as $key => $value): ?>
								

								<div class="col-md-4">
									<div class="thumbnail">
										<img src="uploads/<?php echo $value['image'] ?>" alt="" style="max-height: 150px">
										<div class="caption">
											<h3><?php echo $value['name'] ?></h3>
											<?php if($value['sale_price']  > 0) {?>
											<p>
												<del><?php echo number_format($value['price']) ?></del> VND
												<span style="color: red">
													<?php $precent = 100 - (($value['sale_price'])/($value['price'])*100)?>
													<?php echo  $precent; ?> %
												</span>

											</p>

											<p>
												<span style="color: red"><?php echo number_format($value['sale_price']) ?></span> VND

											</p>
											<?php }else{ ?>
												<p>
													<span><?php echo number_format($value['price']) ?></span> VND
												</p>
											<?php } ?>
											<p>
												<a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">Mua</a>
												<a href="product-detail.php?sp=<?php echo $value['slug'] ?>" class="btn btn-default">Xem</a>
											</p>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php include 'footer.php' ?>