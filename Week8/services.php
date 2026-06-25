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

<title>CiviVote Kenya | Services</title>

<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
rel="stylesheet">

<link
rel="stylesheet"
href="css/style.css">

<style>

.services-container{

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

.services-grid{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));

    gap:25px;

}

.service-card{

    background:white;

    border-radius:20px;

    padding:25px;

    text-align:center;

    box-shadow:0 5px 20px rgba(0,0,0,.08);

    transition:.3s;

}

.service-card:hover{

    transform:translateY(-5px);

}

.service-icon{

    font-size:55px;

    margin-bottom:18px;

}

.service-card h3{

    color:#245000;

    margin-bottom:15px;

}

.service-card p{

    color:#555;

    line-height:1.8;

    font-size:14px;

}
 .content{

    width:100%;

}

.services-container{

    width:100%;

}

@media(max-width:768px){

.page-title{

    font-size:26px;

}

.service-card{

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

<div class="services-container">

<h1 class="page-title">

Voter Services

</h1>

<p class="page-subtitle">

Services available within the CiviVote Kenya system.

</p>

<div class="services-grid">

<div class="service-card">

<div class="service-icon">

📝

</div>

<h3>

Voter Registration

</h3>

<p>

Register new voters quickly and securely while ensuring accurate information is stored in the database.

</p>

</div>

<div class="service-card">

<div class="service-icon">

👥

</div>

<h3>

User Management

</h3>

<p>

Create, edit, search and delete user accounts through the secure administration panel.

</p>

</div>

<div class="service-card">

<div class="service-icon">

🔒

</div>

<h3>

Secure Login

</h3>

<p>

Role-based authentication protects system resources and ensures only authorised users access specific functions.

</p>

</div>

<div class="service-card">

<div class="service-icon">

📊

</div>

<h3>

Reports & Statistics

</h3>

<p>

View system summaries including total users, managers and registered voters through interactive dashboards.

</p>

</div>

<div class="service-card">

<div class="service-icon">

🔍

</div>

<h3>

Search Records

</h3>

<p>

Locate registered users quickly using the built-in search feature available to authorised staff.

</p>

</div>

<div class="service-card">

<div class="service-icon">

📱

</div>

<h3>

Responsive Access

</h3>

<p>

Access CiviVote Kenya comfortably from smartphones, tablets and desktop computers using a responsive interface.

</p>

</div>

</div>

</div>

</div>

<?php include("footer.php"); ?>

</div>

</body>

</html>