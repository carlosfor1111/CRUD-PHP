<?php

//使用者登入後就不會再進入到登入的畫面，會直接導到dashboard頁面
require_once("../TPDO_connect.php");
if(isset($_SESSION["user"])){
    header("location:dashboard.php");
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-4">

                  <!--如果$SESSION["error"]存在,並且$_SESSION["error"]["times"]大於五，使用者就不能登入 -->
                  <?php if(isset($_SESSION["error"])&& $_SESSION["error"]["times"]>=5):?>
                    <h1 class="text-center">登入</h1>
                    <div class="text-danger">您嘗試登入的次數過多，請稍後再來</div>
                  <?php else:?>
                  <!-- -->

                  <form id="form" action="doLogin.php" method="post">
                      <h1 class="text-center">登入</h1>
                      <div class="mb-2">
                          <label for="">帳號</label>
                          <input type="text" name="account" class="form-control">
                      </div>
                      <div class="mb-2">
                          <label for="">密碼</label>
                          <input type="password" name="password" class="form-control">
                      </div>

                      <!--如果使用者登入時，帳號或密碼有誤，告知有誤以及登入錯誤次數是幾次-->
                     <?php if(isset($_SESSION["error"])): ?> 
                      <div class="mb-2">
                        <small class="text-danger">
                            <?php echo $_SESSION["error"]["message"] ?>
                            ,登入錯誤次數<?php echo $_SESSION["error"]["times"]?> 
                        </small>
                      </div>
                      <?php endif; ?>
                      <!-- -->

                      <button id="sign" class="btn btn-info" type="submit">送出</button>
                  </form>
              </div>
              <?php endif;?><!--登入錯誤次數過多-->
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>