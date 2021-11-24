<!doctype html>
<html lang="en">

<head>
  <title>新增後臺帳號</title>
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
      height: 100%;
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
      border: 1px solid #666;
      background-color: rgba(0, 0, 0, .5);
      color: #fff;
      border-radius: 10px;
    }

    h2 {
      margin-bottom: 50px;
      text-transform: uppercase;
      font-weight: bold;
      letter-spacing: 1px;
    }
  </style>
</head>

<body>

  <div class="container m-auto">
    <div class="row justify-content-center ">
      <div class="col-sm-12 col-lg-6 borderblack ">
        <h2 class="text-center"><small class="text-light">註冊</small></h2>
        <form method="post" action="userCreate.php" id="form">
          <div class="form-group row py-2">
            <label for="account" class="col-sm-2 col-form-label">帳號:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="account" placeholder="請輸入 4~8 碼帳號" name="account" required>
              <small class="text-danger" id="accountMsg"></small>
            </div>
          </div>
          <div class="form-group row  py-2">
            <label for="password" class="col-sm-2 col-form-label">密碼:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="請設定您的密碼" required>
            </div>
            <div class="invalid-feedback">密碼有誤，請再次輸入密碼</div>
          </div>
          <div class="form-group row  py-2 ">
            <label for="repassword" class="col-sm-2 col-form-label">確認密碼:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="repassword" name="repassword" placeholder="請再次輸入你的密碼" required>
            </div>
            <div class="invalid-feedback">密碼有誤，請再次輸入密碼</div>
          </div>

          <div class="form-group row py-4 ">
            <div class="col-xs-12 text-center">
              <button type="submit" class="btn btn-primary" id="sign">確認註冊</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    $("#account").on({
      "change": function() {
        // console.log("change")
        $("#accountMsg").text("");
        let account = $(this).val();
        let formdata = new FormData();
        formdata.append("account", account);

        axios.post('../php/check_username.php', formdata)
          .then(function(response) {
            // console.log(response);
            if (response.data.count === 1) {
              $("#accountMsg").text("這個帳號已經有人註冊過了")
            }
          })
          .catch(function(error) {
            console.log(error);
          });
      },
      "keyup": function() {
        $("#accountMsg").text("");
        let accountLength = $(this).val().length;
        if (accountLength < 4) {
          $("#accountMsg").text("帳號太短")
        } else if (accountLength > 8) {
          $("#accountMsg").text("帳號太長")
        }
      }
    })

    $("#sign").click(function(e) {
      e.preventDefault();
      let passContent = $("#password").val();
      let repassContent = $("#repassword").val();
      if (passContent === repassContent) {
        // alert("密碼一致")
        $("form").submit();
      } else {
        $("#password").addClass('is-invalid');
        $("#repassword").addClass('is-invalid');
        alert("前後密碼不一致")
      }
    })
  </script>
</body>

</html>