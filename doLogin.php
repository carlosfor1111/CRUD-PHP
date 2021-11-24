<?php
require_once("php/pdo_connect_travel.php");

if(!isset($_POST["account"])){
    echo "請循正常管道進入";
    header("location:login.php");
    exit();
}


$account= $_POST["account"];
$password=$_POST["password"];

$stmt=$db_host->prepare("SELECT * FROM manager WHERE name=? AND password=? AND valid=1");
  


try{
    $stmt->execute([$account,$password]);

    //檢查密碼
    $loginStatus=$stmt->rowCount();//rowCount()->query出來的結果的筆數
    if ($loginStatus===0){

        //如果$_SESSION["error"]這個key存在的話，就把他的["times]拿出來＋１
        //就可以知道錯誤次數是多少
        if(isset ($_SESSION["error"])){
            $times=$_SESSION["error"]["times"]+1;
        }else{
            $times=1;
        }



        //把error的錯誤訊息存到關聯式陣列，然後再回到登入頁面
            $dataError=array(
                "message"=>"您的帳號密碼錯誤",
                "times"=>$times
            );
            $_SESSION["error"]=$dataError;
            header("location:login.php");

    }else{
      while($row=$stmt->fetch()){
        // echo $row["id"].".".$row["name"].":".$row["email"];
        // echo "<br>";
        $dataUser=array(
            "name"=>$row["name"],
            "account"=>$row["account"],
            "email"=>$row["email"],
            "phone"=>$row["phone"],

        ); 
        unset( $_SESSION["error"]);
        $_SESSION["user"]=$dataUser;
        //登入成功後，跳轉到dashboard的頁面
        header("location: "); 
        

    }
}


}catch(PDOException $e){
    echo"資料庫連結失敗<br>";
    echo"Eroor:".$e->getMessage()."<br>";
    exit;

}



?>