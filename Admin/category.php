<?php include 'header.php';
$category = mysqli_query($connect,"SELECT * FROM category");


// phân trang danh mục

// Bước 1 tính tổng số bản ghi của bảng category

$total = mysqli_num_rows($category);

// Bước 2 : thiết lập số bả ghi trên 1 trang
$limit = 3;

// Bước 3: Tính số trang

$page = ceil($total/$limit);

// Bước 4: lấy trang hiện tại

$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);


// Bước 4 : tính start 

$start = ($cr_page - 1)*$limit;

// Bước 5 query sử dụng limit

$category = mysqli_query($connect,"SELECT * FROM category LIMIT $start,$limit");


// Tìm kiếm


if(isset($_GET['key'])){
	$key = $_GET['key'];
	$category = mysqli_query($connect,"SELECT * FROM category WHERE name LIKE '%$key%'");
}
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$slug = $_POST['slug'];
	$status = $_POST['status'];

	// thêm mới
	mysqli_query($conn,"INSERT INTO category(name,slug,status) VALUES ('$name','$slug','$status')");
	header('location: category.php');
}



 ?>

<section class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm mới</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form">

						<div class="form-group">
							<label for="">Tên danh mục</label>
							<input type="text" class="form-control" id="name" placeholder="Input field" name="name" onchange="ChangeToSlug()">
						</div>

						<div class="form-group">
							<label for="">Slug</label>
							<input type="text" class="form-control" id="slug" placeholder="Input field" name="slug">
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


						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Danh sách danh mục</h3>
					<form action="" method="GET" class="form-inline" role="form">
					
						<div class="form-group">
							<label class="sr-only" for="">Tên danh mục</label>
							<input type="text" class="form-control" id="" placeholder="Input field" name="key">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary">Tìm kiếm</button>
					</form>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên danh mục</th>
								<th>Trạng thái</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($category as $key => $value) {?>
								<tr>
									<td><?php echo $key + 1?></td>
									<td><?php echo $value['name']?></td>
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
				<ul class="pagination">
					<?php if($cr_page -1 > 0) {?>
					<li><a href="category.php?page=<?php echo $cr_page -1 ?>">&laquo;</a></li>
					<?php } ?>
					<?php for ($i=1; $i <=$page ; $i++) {?>
						<li class="<?php echo (($cr_page == $i)? 'active' :'')?>"><a href="category.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php } ?>
					<?php if($cr_page +1 <= $page) {?>
						<li><a href="category.php?page=<?php echo $cr_page + 1 ?>">&raquo;</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>	
</section>

<?php include 'footer.php' ?>