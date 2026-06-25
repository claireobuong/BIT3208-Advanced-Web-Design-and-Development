<?php

session_start();

if(
    !isset($_SESSION["user"]) ||
    !isset($_SESSION["role"])
){

    header("Location: login.php");

    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | About Us</title>

<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
rel="stylesheet">

<link
rel="stylesheet"
href="css/style.css">

<style>

.about-container{

    margin-top:30px;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:32px;

    margin-bottom:15px;

}

.page-subtitle{

    text-align:center;

    color:#466128;

    margin-bottom:40px;

}

.about-grid{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));

    gap:25px;

}

.about-card{

    background:white;

    padding:25px;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.08);

}

.about-card h3{

    color:#245000;

    margin-bottom:15px;

}

.about-card p{

    line-height:1.8;

    color:#555;

}

.features{

    margin-top:15px;

}

.features li{

    margin-bottom:10px;

    color:#444;

}

.content{

    width:100%;

}

.about-container{

    width:100%;

}

@media(max-width:768px){

.page-title{

    font-size:26px;

}

.about-card{

    padding:20px;

}

}

</style>

</head>

<body>

<div class="container">

<div class="circle1"></div>

<div class="circle2"></div>

<?php include("navbar.php"); ?>

<div class="content">

<div class="about-container">

<h1 class="page-title">

About CiviVote Kenya

</h1>

<p class="page-subtitle">

A secure and responsive voter registration management system.

</p>

<div class="about-grid">

<div class="about-card">

<h3>

Our Mission

</h3>

<p>

CiviVote Kenya was developed to simplify voter registration management through a secure, user-friendly and responsive web application. The system helps administrators manage voter records while providing registered users with easy access to their information.

</p>

</div>

<div class="about-card">

<h3>

System Features

</h3>

<ul class="features">

<li>✔ Secure user authentication</li>

<li>✔ Role-based access control</li>

<li>✔ User registration and management</li>

<li>✔ Search and view registered users</li>

<li>✔ Edit and delete user accounts</li>

<li>✔ Responsive design for phones, tablets and desktops</li>

</ul>

</div>

<div class="about-card">

<h3>

Technologies Used

</h3>

<p>

The system is developed using HTML, CSS, JavaScript, PHP and MySQL. Responsive layouts are built using Flexbox, CSS Grid and Media Queries to ensure the application works well across different screen sizes.

</p>

</div>

<div class="about-card">

<h3>

Why CiviVote?

</h3>

<p>

The platform provides a modern interface that improves usability while maintaining secure access to voter information. Its responsive design allows users to work comfortably from desktop computers, tablets and smartphones.

</p>

</div>

</div>

</div>

</div>

<?php include("footer.php"); ?>

</div>

</body>

</html>