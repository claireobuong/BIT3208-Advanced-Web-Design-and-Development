<?php

session_start();

if(!isset($_SESSION["username"])){

    header("Location: login.php");
    exit();

}

$username = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    max-width:500px;

    padding:32px;

}

.content{

    position:relative;

    z-index:2;

    text-align:center;

}

.icon-circle{

    width:75px;

    height:75px;

    background:white;

    border-radius:50%;

    margin:0 auto 20px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:32px;

}

button{

    width:180px;

    border-radius:40px;

    margin-top:20px;

}

.info-card{

    margin-top:25px;

    background:rgba(255,255,255,.18);

    border-radius:20px;

    padding:18px;

}

.info-title{

    color:#245000;

    font-weight:600;

    margin-bottom:8px;

}

.info-text{

    color:#35551f;

    font-size:13px;

}

a{

    text-decoration:none;

}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <div class="content">

        <div class="icon-circle">

            ✅

        </div>

        <h1>

            Welcome <?php echo htmlspecialchars($username); ?>

        </h1>

        <p>

            You have successfully logged into the voter registration system.

        </p>

        <a href="logout.php">

            <button>

                Logout

            </button>

        </a>

        <div class="info-card">

            <div class="info-title">

                Session Active

            </div>

            <div class="info-text">

                User session successfully created after login.

            </div>

        </div>

    </div>

</div>

</body>

</html>