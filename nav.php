<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<style>
    .nav {
        position: fixed;
        background: #666666;
        height: 12vh;
        width: 100%;
        transition: top 0.5s;
        border-bottom: 2px solid black;
        z-index: 10;
    }

    .logo a{
        text-decoration: none;
        font-size: 30px;
        color:aliceblue;
        line-height: 100px;
        margin-left: 35px;
    }
    .nav ul {
        float: right;
        margin-right: 10px;
    }

    .nav ul li {
        display: inline-block;
        margin-top: 6vh;
    }

    .nav ul li a {
        color: rgb(255, 255, 255);
        font-size: 20px;
        font-weight: bold;
        padding: 15px 15px;
        border-radius: 5px;
        text-decoration: none;
    }

    .nav ul li a:hover {
        background-color: rgba(198, 186, 186, 0.781);
        transition: .5s;
    }

  

</style>

<body>
    <div class="nav" id="navbar">

        <label class="logo">
            <a href="index.php">
                Sonic
            </a>
        </label>

        <ul id="side">
            <?php 
                session_start();
                if(isset($_SESSION["als"])){
                    echo "<li><a href='admin.php'>Admin</a></li>";
                }
                if(isset($_SESSION["cls"])){
                    echo "<li><a href='customer.php'>".$_SESSION["cid"]."</a></li>";
                    echo "<li><a href='order.php'>New order</a></li>";
                }
                if(!isset($_SESSION["als"]) && !isset($_SESSION["cls"])){
                    echo "<li><a href='alogin.php'>Admin Login</a></li>";
                    echo "<li><a href='clogin.php'>Customer Login</a></li>";
                    echo "<li><a href='signup.php'>Signup</a></li>";
                }
                else{
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }
            ?>

            

        </ul>
    </div>
</body>

</html>