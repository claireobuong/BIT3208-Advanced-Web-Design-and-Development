<?php

session_start();

if(
    !isset($_SESSION['user']) ||
    !isset($_SESSION['role'])
){

    header("Location: login.php");

    exit();

}

if($_SESSION["role"] != "voter"){

    header("Location: login.php");

    exit();

}

$fullname = $_SESSION["fullname"];

$role = $_SESSION["role"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Voter Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    width:95%;
    max-width:1100px;
    padding:30px;

}

.dashboard-card{

    max-width:550px;
    margin:30px auto 0 auto;
    text-align:center;

}

.icon-circle{

    width:90px;
    height:90px;
    margin:20px auto;

    background:white;
    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:38px;

}

.page-title{

    color:#245000;
    font-size:28px;
    font-weight:600;
    margin-bottom:15px;

}

.message{

    color:#35551f;
    font-size:14px;
    line-height:1.8;
    margin-bottom:25px;

}

button{

    width:180px;

}

.info-card{

    margin-top:25px;
    background:rgba(255,255,255,.18);
    padding:20px;
    border-radius:20px;

}

.info-title{

    color:#245000;
    font-size:15px;
    font-weight:600;
    margin-bottom:10px;

}

.info-text{

    color:#35551f;
    font-size:13px;
    line-height:1.8;

}

.role-badge{

    display:inline-block;

    background:#1f6f8b;
    color:white;

    padding:8px 18px;

    border-radius:20px;

    font-size:13px;

    margin-bottom:20px;

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

                🗳️

            </div>

            <div class="role-badge">

                Voter

            </div>

            <h1 class="page-title">

                Welcome <?php echo htmlspecialchars($fullname); ?>

            </h1>

            <div class="message">

                You have successfully logged into the CiviVote Kenya Voter Registration System.

            </div>

            <a href="logout.php">

                <button type="button">

                    Logout

                </button>

            </a>

            <div class="info-card">

                <div class="info-title">

                    Account Information

                </div>

                <div class="info-text">

                    <strong>Role:</strong>

                    <?php echo htmlspecialchars($role); ?>

                    <br><br>

                    As a voter, you can only access your own account information and voter details. Administrative functions are restricted.

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>