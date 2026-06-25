<?php

session_start();

if(!isset($_SESSION['user'])){

    header("Location: login.php");

    exit();

}

$username = $_SESSION['user'];

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

    width:95%;

    max-width:1100px;

    padding:30px;

}

.dashboard-card{

    max-width:500px;

    margin:30px auto 0 auto;

    text-align:center;

}

.icon-circle{

    width:85px;

    height:85px;

    margin:20px auto;

    background:white;

    border-radius:50%;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:36px;

}

.page-title{

    color:#245000;

    font-size:26px;

    font-weight:600;

    margin-bottom:15px;

}

.message{

    color:#35551f;

    font-size:14px;

    line-height:1.8;

    margin-bottom:30px;

}

button{

    width:180px;

}

.info-card{

    margin-top:25px;

    background:rgba(255,255,255,.18);

    padding:18px;

    border-radius:20px;

}

.info-title{

    color:#245000;

    font-size:14px;

    font-weight:600;

    margin-bottom:8px;

}

.info-text{

    color:#35551f;

    font-size:12px;

    line-height:1.7;

}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <?php include("navbar.php"); ?>

    <div class="content">

        <div class="dashboard-card">

            <div class="icon-circle">

                ✅

            </div>

            <h1 class="page-title">

                Welcome <?php echo htmlspecialchars($username); ?>

            </h1>

            <div class="message">

                You have successfully logged into the
                CiviVote Kenya Voter Registration System.

            </div>

            <a href="logout.php">

                <button type="button">

                    Logout

                </button>

            </a>

            <div class="info-card">

                <div class="info-title">

                    Session Active

                </div>

                <div class="info-text">

                    Your login session has been verified successfully.
                    Unauthorized users cannot access this page directly.

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>