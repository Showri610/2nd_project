<?php
include("connection.php");
?>


<html lang="en">

<head>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Times New Roman, serif;
      color: rgb(0, 0, 0);
      background-image: none;
      background-size: cover;
    }

    .main {
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      background-image: url('wallpaper.png');
      background-size: cover;
    }

     .box {
      margin-top: 8vh;
      display: inline-block;
      text-align: center;
      width: 700px;
      height: 100px;
      backdrop-filter: blur(15px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      text-shadow: 0 0 2px #fff;

    }

     .box h1 {
      padding-top: 25px;
      margin-bottom: 15px;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sonic</title>

  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12/lib/typed.min.js"></script>


</head>

<body class="index">

  <script>
    $(function () {
      $("#nav-placeholder").load("nav.php");
    });
  </script>
  <div id="nav-placeholder"></div>


  <div class="main">

  </div>

    <script>
      $(function () {
        $("#footer-placeholder").load("footer.php");
      });
    </script>
    <div id="footer-placeholder"></div>

  </div>

</body>

</html>