<?php
require_once "../db_connect_travel.php";
if (isset($_GET["product_name"])) {
    $product_name = $_GET["product_name"];
} else {
    echo "沒有帶資料";
    exit;
}

// $product_name = strip_tags($_POST['product_name']);
$product_name = $_GET['product_name'];
$user_id = $_GET["user_id"];
$now = date('Y-m-d H:i:s');
$name = $_GET["name"];
// $product_order=$sql("select id+60 from product_order ");


// $sql="INSERT INTO product_order (product_name,buy_time,name,vaild,product_order) 
//     VALUES ('$product_name','$now','$name','1','$product_order')";


$sql = "INSERT INTO `order_detail`(`id`, `buy_time`, `name`, `status`) VALUES ('$user_id','$now','$name','1')";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

// $conn->close();

header('location:insert-order.php');
?>








<?php
// require_once("../travel_connect.php");

// $sql="INSERT INTO member(name,account,phone,email,create_time,gender,valid,birth)VALUES(?,?,?,?,?,?,?,?)";
// $stmt=$db_host->prepare($sql);
// $name=$_POST["name"];
// $account=$_POST["account"];
// $phone=$_POST["phone"];
// $email=$_POST["email"];
// $create_time=date('Y-m-d H:i:s');
// $gender=$_POST["gender"];
// $valid="1";
// $birth=$_POST["birth"];

// $stmt->execute([$name,$account,$phone,$email,$create_time,$gender,$valid,$birth]);
// echo "新資料已建立";

// header("location:cruduser-list.php")
?>