<?php
require_once("pdo_connect_travel.php");
if (isset($_SESSION["user"])) {
    header("location:../member.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
        html {
            height: 100vh;

        }


        body {
            display: flex;
            height: 100vh;
            margin-top: auto;
            background-image: url("https://picsum.photos/1400/1200");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }

        .borderblack {
            color: #fff;
            border: 1px solid #666;
            background-color: rgba(0, 0, 0, .6);
            border-radius: 10px;
            height: px;
            width: 500px;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <div class="container  m-auto">
        <div class="row justify-content-center ">
            <?php if (isset($_SESSION["error"]) && $_SESSION["error"]["times"] > 5) : ?>
                <h1 class="text-center ">登入</h1>
                <div class="text-danger text-center">您嘗試的登入錯誤次數過多，請稍後再來</div>
            <?php else : ?>

                <div class="col-sm-12 col-lg-6 borderblack">
                    <h2 class="text-center"><small class="text-light">登入</small></h2>
                    <form method="post" action="doLogin.php" id="form">
                        <div class="form-group row py-2   mb-3" >
                            <label for="account" class="col-sm-2 col-form-label">帳號:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="account" placeholder="請輸入您的帳號" name="account" required>
                            </div>
                        </div>
                        <div class="form-group row  py-2 mb-3">
                            <label for="password" class="col-sm-2 col-form-label">密碼:</label>
                            <div class="col-sm-10 mb-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="請輸入您密碼" required>
                            </div>
                            <?php if (isset($_SESSION["error"])) : ?>
                                <div class="mb-2">
                                    <small class="text-danger"><?php echo $_SESSION["error"]["message"] ?>,登入錯誤次數<?php echo $_SESSION["error"]["times"] ?></small>
                                </div>
                            <?php endif;  ?>

                        </div>
                        <div class="form-group row py-4 ">
                            <div class="col-xs-12 text-center">
                                <button type="submit" class="btn btn-success" id="login">送出</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>

</html>