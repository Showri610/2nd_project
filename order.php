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
    }

    .main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      width: 100%;
    }

    .box {
      display: inline-block;
      text-align: center;
      width: 500px;
      height: 420px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 5vh;
    }

    .box h1 {
      padding-top: 20px;
      margin-bottom: 15px
    }

    .input,
    .drop,
    input[type=file]::file-selector-button {
      text-align: center;
      background-color: transparent;
      border-radius: 10px;
      border: 1px solid;
      width: 65%;
      margin-top: 8px;
      height: 30px;
    }

    #img-label {

      display: block;
      width: 65%;
      border-radius: 10px;
      border: 1px solid;
      height: 30px;
      margin: 0 0 0 17%;
    }

    option {
      text-align: center;
      background-color: rgba(95, 92, 89, 0.271);
      color: rgb(0, 0, 0);
    }


    ::-webkit-input-placeholder {
      text-align: center;
      color: rgb(0, 0, 0);
    }

    .submit {
      width: 60%;
      height: 40px;

      border: none;
      margin: 15 0 10 0px;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.658);
      color: rgba(255, 255, 255, 0.737);
    }

    .submit:hover {
      background-color: rgba(246, 241, 241, 0.305);
      color: rgb(0, 0, 0);
      box-shadow: 0 0 30px rgb(0, 0, 0);
    }

  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <title>New order</title>
</head>

<body class="order">

  <script>
    $(function () {
      $("#nav-placeholder").load("nav.php");
    });
  </script>
  <div id="nav-placeholder"></div>

  <div class="main">
    <form action="order.php" method="post">
        <h2>Add new order</h2>
        <input type="text" placeholder="Reciever Username" name="username" class="input" required>
        <input type="text" placeholder="Address" name="address" class="input" required>
        <input type="text" placeholder="Phone" name="phone" class="input" required><br>
        <button type="submit" name="submit" class="submit">Add</button>

        <?php
        include("connection.php");
        if (isset($_POST['submit'])) {
        $count = "SELECT * FROM `customer`";
        $rcount = $con->query($count);
        $id = $rcount->num_rows+1;
        $username = $_POST['username'];
        $sender = $_SESSION['cid'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

            $query = "INSERT INTO delivery VALUES ('$id', '$sender', '$username', '$address', '$phone', 'Waiting')";

            if (mysqli_query($con, $query)) {
                header("Location: customer.php");
            } 
            else {
            echo "<div class='error'><p>An error occured</p></div>";
            }
        }
        ?>
    </form>
    </div>

  
  <script>
    $(function () {
      $("#footer-placeholder").load("footer.php");
    });
  </script>
  <div id="footer-placeholder"></div>

</body>

</html>