<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Home</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.hero{

    text-align:center;
    padding:50px 20px;

}

.hero img{

    width:170px;
    margin-bottom:25px;

}

.hero h1{

    font-size:42px;
    color:#245000;
    margin-bottom:15px;

}

.hero p{

    max-width:750px;
    margin:auto;
    color:#466128;
    line-height:1.8;
    font-size:16px;

}

.buttons{

    margin-top:35px;

}

.buttons a{

    display:inline-block;
    margin:10px;
    padding:14px 28px;
    text-decoration:none;
    border-radius:10px;
    font-weight:600;
    transition:.3s;

}

.primary{

    background:#245000;
    color:white;

}

.primary:hover{

    background:#2f7000;

}

.secondary{

    background:white;
    color:#245000;
    border:2px solid #245000;

}

.secondary:hover{

    background:#245000;
    color:white;

}

.features{

    margin-top:60px;

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));

    gap:25px;

}

.feature{

    background:white;

    border-radius:20px;

    padding:25px;

    box-shadow:0 5px 20px rgba(0,0,0,.08);

}

.feature h3{

    color:#245000;

    margin-bottom:15px;

}

.feature p{

    color:#555;

    line-height:1.7;

}

</style>

</head>

<body>

<div class="container">

<div class="circle1"></div>

<div class="circle2"></div>

<?php include("public_navbar.php"); ?>

<div class="hero">

<img
    src="images/logo.jpg"
    alt="CiviVote Kenya Logo"
>

<h1>

CiviVote Kenya

</h1>

<p>

A secure voter registration and management system designed to improve voter registration, user administration, and voter education through a modern, responsive web application.

</p>

<div class="buttons">

<a
    href="login.php"
    class="primary"
>

Login

</a>

<a
    href="about.php"
    class="secondary"
>

Learn More

</a>

</div>

</div>

<div class="features">

<div class="feature">

<h3>

Secure Registration

</h3>

<p>

Register voters securely using modern authentication and organized digital records.

</p>

</div>

<div class="feature">

<h3>

User Management

</h3>

<p>

Manage Super Administrators, Managers, and Voters through role-based access control.

</p>

</div>

<div class="feature">

<h3>

Voter Education

</h3>

<p>

Access educational materials that guide citizens through the voter registration process.

</p>

</div>

</div>

<?php include("footer.php"); ?>

</div>

</body>

</html>