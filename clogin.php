<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Times New Roman, serif;
      color: rgb(0, 0, 0);
    }

    .main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
    }

    .box {
      margin-top: 6vh;
      display: inline-block;
      text-align: center;
      width: 450px;
      height: 500px;
      background-color: #9400D3;
      border: 3px solid black;
      border-radius: 10px;
    }

    .box h1 {
      padding-top: 120px;
      margin-bottom: 30px;
    }

    .input {
      text-align: center;
      background-color: white;
      margin-top: 10px;
      border: none;
      border-bottom: 1px solid;
      width: 70%;
      height: 35px;
    }

    ::-webkit-input-placeholder {
      text-align: center;
      color: rgb(0, 0, 0);
    }

    .submit {
      width: 70%;
      height: 40px;
      border: none;
      margin: 5% 0 3% 0;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.658);
      color: rgba(255, 255, 255, 0.737);
    }

    .submit:hover {
      background-color: black;
      color: white;
    
    }

    .box p {
      margin-bottom: 6px;
    }

    .box a {
      color: black;
      text-decoration: none;
      font-weight: 600;
    }


    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body class="clogin">

  <script>
    $(function () {
      $("#nav-placeholder").load("nav.php");
    });
  </script>
  <div id="nav-placeholder"></div>


  <div class="main">


      <form action="clogin.php" method="post">

      <h1>Customer Login</h1>
        <input type="text" class="input" id="username" name="username" placeholder="Username" required>

        <input type="password" class="input" id="pass" name="pass" placeholder="Password" required>

        <input type="submit" class="submit" value="login" name="login">

        <p>Don't have an account? <a href="SignUp.php">SignUp</a></p>

        <?php
        include("connection.php");
        if (isset($_POST['login'])) {
          $username = $_POST['username'];
          $pass = $_POST['pass'];

          $sql1 = "select username,password from customer where username='$username' and password='$pass'";

          $cus = mysqli_query($con, $sql1);

           if (mysqli_num_rows($cus) > 0) {
            $_SESSION['cid'] = $username;
            $_SESSION['cls'] = "true";
            header("Location:customer.php");
          } else {
            echo "<div class='error'><p>Invalid Username or Password</p></div>";
          }
        }
        ?>

      </form>
    </div>


  <!-- footer start -->
  <script>
    $(function () {
      $("#footer-placeholder").load("footer.php");
    });
  </script>
  <div id="footer-placeholder"></div>
  <!-- footer end -->

</body>

</html>