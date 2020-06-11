<?php 
include 'config_db/connect.php';
session_start();

if(isset($_GET['id'])){
	$id = $_GET['id'];
}
$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';

$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;

if($quantity <=0){
	$quantity = 1;
}
// session_destroy();
// echo $action;
// echo "<br>";
// echo $id;
// die();
// var_dump($action);
//  die();

$query = mysqli_query($conn,"SELECT * FROM product WHERE id = $id");

if($query){
	$product = mysqli_fetch_assoc($query);
}

$item = [
	'id'=>$product['id'],
	'name'=>$product['name'],
	'image'=>$product['image'],
	'price'=>($product['sale_price'] > 0) ? $product['sale_price'] : $product['price'],
	'quantity'=>$quantity
];

if($action == 'add'){
	if(isset($_SESSION['cart'][$id])){
	$_SESSION['cart'][$id]['quantity'] += $quantity;
	}
	else{
		$_SESSION['cart'][$id] = $item;
	}
}
if($action == 'update'){
	$_SESSION['cart'][$id]['quantity'] = $quantity;
}

if($action == 'delete'){

	unset($_SESSION['cart'][$id]);
}


header('location: view-cart.php');
echo "<pre>";
print_r($_SESSION['cart']);

// thêm mới vào giỏ hàng

// Cập nhật giỏ hàng


//Xóa sản phẩm khỏi giỏ hàng

 ?>