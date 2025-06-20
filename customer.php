<?php
session_start();
if($_SESSION['cls']!="true"){
    header("Location:index.php");
}
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
      background: white;
    }

    .main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      background: rgba(51, 43, 43, 0.3);
    }

    .box {
      text-align: center;
      width: 800px;
      min-height: 50px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 15vh;
      margin-bottom: 5vh;
    }

    .box h1 {
      padding-top: 20px;
    }


    /* table css start */

    .table-container {
      width: fit-content;
      height: 100%;
      margin: auto;
      padding-bottom: 40px;
    }

    table {
      border-collapse: collapse;
      width: 650px;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 6px;
      text-align: center;
    }

    .submit {
      width: 100%;
      height: 25px;
      font-weight: 600;
      border: 1px solid;
      border-radius: 5px;
      background: rgb(140, 140, 140);
      color: black;
    }

    .submit:hover {
      background: rgb(62, 62, 62);
      color: rgb(220, 220, 220);
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body class="admin">

  <script>
    $(function () {
      $("#nav-placeholder").load("nav.php");
    });
  </script>
  <div id="nav-placeholder"></div>

  <div class="main">
      <?php
      include ('connection.php');
      $sql = "SELECT * FROM `delivery` WHERE sender='".$_SESSION["cid"]."'";
      $result = $con->query($sql);
      ?>

      <div class="table-container">
        <h1>Dashboard</h1>
        <h3>Sent products</h3>
        <table>
        <tr>
          <th>Delivery ID</th>
          <th>Reciever</th>
          <th>Status</th>
        </tr>
        <?php

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
              <td>".$row["id"]."</td>
              <td>".$row["reciever"]."</td>
              <td>".$row["status"]."</td>
            </tr>";
            }
        }
        ?>
        </table>
        <?php
        $sql = "SELECT * FROM `delivery` WHERE reciever='".$_SESSION["cid"]."'";
        $result = $con->query($sql);
        ?>

      <div class="table-container">
        <br><h3>Products sent to you</h3>
        <table>
        <tr>
          <th>Delivery ID</th>
          <th>Sender</th>
          <th>Status</th>
        </tr>
        <?php

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
              <td>".$row["id"]."</td>
              <td>".$row["sender"]."</td>
              <td>".$row["status"]."</td>
            </tr>";
            }
        }

        ?>
        </table>
      </div>

    </div>
  </div>
  <script>
    $(function () {
      $("#footer-placeholder").load("footer.php");
    });
  </script>
  <div id="footer-placeholder"></div>

</body>

</html>