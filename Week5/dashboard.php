<?php

session_start();

if(isset($_POST['username'])){

    $_SESSION['user'] = $_POST['username'];
}

$username = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    padding:0;

    font-family:'Poppins', sans-serif;

    background:#eef1e8;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;
}

.container{
    width:500px;

    background:#b8d98a;

    padding:50px;

    border-radius:40px;

    text-align:center;

    position:relative;

    overflow:hidden;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);
}

/* BACKGROUND CIRCLES */

.circle1{
    position:absolute;

    width:180px;
    height:180px;

    background:rgba(255,255,255,0.12);

    border-radius:50%;

    top:-70px;
    right:-60px;
}

.circle2{
    position:absolute;

    width:130px;
    height:130px;

    background:rgba(255,255,255,0.10);

    border-radius:50%;

    bottom:-50px;
    left:-40px;
}

.content{
    position:relative;
    z-index:2;
}

/* ICON */

.icon-circle{
    width:90px;
    height:90px;

    background:white;

    border-radius:50%;

    margin:auto;
    margin-bottom:25px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:38px;
}

h1{
    color:#245000;

    font-size:28px;

    margin-bottom:12px;
}

p{
    color:#35551f;

    font-size:13px;

    line-height:1.8;

    margin-bottom:30px;
}

/* BUTTON */

button{
    padding:14px 40px;

    border:none;

    border-radius:40px;

    background:#245000;

    color:white;

    font-size:14px;

    cursor:pointer;

    transition:0.3s;
}

button:hover{
    background:#336600;
}

/* SMALL CARD */

.info-card{
    background:rgba(255,255,255,0.18);

    padding:18px;

    border-radius:25px;

    margin-top:25px;
}

.info-title{
    color:#245000;

    font-size:14px;

    font-weight:600;

    margin-bottom:6px;
}

.info-text{
    color:#35551f;

    font-size:11px;

    line-height:1.7;
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
            Welcome <?php echo $username; ?>
        </h1>

        <p>

            You have successfully logged into
            the voter registration system.

        </p>

        <a href="login.php">

    <button>
        Logout
    </button>

</a>

        <div class="info-card">

            <div class="info-title">
                Session Active
            </div>

            <div class="info-text">

                User session successfully
                created after login.

            </div>

        </div>

    </div>

</div>

</body>

</html>