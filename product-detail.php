<?php include 'header.php';

if(isset($_GET['sp'])){
	$slug = $_GET['sp'];
	$product = mysqli_query($conn,"SELECT * FROM product WHERE slug = '$slug'");
	$data = mysqli_fetch_assoc($product);
	// var_dump($data);
}	

?>

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="panel panel-info">
				
				<div class="panel-body">
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="uploads/<?php echo $data['image']?>" alt="Image" width = 350px>
						</a>
						<div class="media-body">
							<h4 class="media-heading"><?php echo $data['name'] ?></h4>
							
							<div class="caption">
								<form method="GET" action="cart.php">


									<?php if($data['sale_price']  > 0) {?>
										<p>
											<del><?php echo number_format($data['price']) ?></del> VND
											<span style="color: red">
												<?php $precent = 100 - (($data['sale_price'])/($data['price'])*100)?>
												<?php echo  $precent; ?> %
											</span>

										</p>

										<p>
											<span style="color: red"><?php echo number_format($data['sale_price']) ?></span> VND

										</p>
									<?php }else{ ?>
										<p>
											<span><?php echo number_format($data['price']) ?></span> VND
										</p>
									<?php } ?>
									<input type="number" name="quantity" value="1">
									
									<input type="hidden" name="id" value="<?php echo $data['id']?>">
									<p>
										<button type = "submit" class="btn btn-primary">Mua</button>
										<a href="product-detail.php?sp=<?php echo $data['slug'] ?>" class="btn btn-default">Xem</a>
									</p>

								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Thoong tin chi tiete</h3>
					</div>
					<div class="panel-body deess">
						<?php echo $data['dess'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php include 'footer.php' ?>