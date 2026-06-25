<?php

session_start();

if(
    !isset($_SESSION["user"]) ||
    !isset($_SESSION["role"])
){

    header("Location: login.php");

    exit();

}

if($_SESSION["role"] != "manager"){

    header("Location: login.php");

    exit();

}

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week7db"
);

if(!$conn){

    die("Connection failed: " . mysqli_connect_error());

}

$fullname = $_SESSION["fullname"];

$totalUsers = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total FROM users"
    )
)["total"];

$totalVoters = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total FROM users WHERE role='voter'"
    )
)["total"];

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Manager Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    width:95%;

    max-width:1200px;

    margin:auto;

    padding:30px;

}

.page-title{

    color:#245000;

    font-size:30px;

    margin-bottom:10px;

}

.subtitle{

    color:#466128;

    margin-bottom:25px;

    font-size:15px;

}

.cards{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:20px;

    margin-top:30px;

}

.card{

    background:white;

    padding:25px;

    border-radius:18px;

    text-align:center;

    box-shadow:0 5px 15px rgba(0,0,0,.08);

}

.card h2{

    font-size:38px;

    color:#245000;

    margin-bottom:10px;

}

.card p{

    color:#666;

    font-size:14px;

}

.quick-actions{

    margin-top:35px;

    background:white;

    padding:25px;

    border-radius:18px;

    box-shadow:0 5px 15px rgba(0,0,0,.08);

}

.quick-actions h3{

    margin-bottom:20px;

    color:#245000;

}

.actions{

    display:flex;

    gap:20px;

    flex-wrap:wrap;

}

.actions a{

    display:inline-block;

    padding:12px 24px;

    background:#245000;

    color:white;

    text-decoration:none;

    border-radius:10px;

    transition:.3s;

}

.actions a:hover{

    background:#3a7000;

}

/* ===============================
   Responsive Design
=============================== */

@media(max-width:768px){

.container{

    width:100%;

    padding:20px;

}

.page-title{

    font-size:24px;

}

.subtitle{

    font-size:14px;

}

.cards{

    grid-template-columns:1fr;

}

.card h2{

    font-size:32px;

}

.actions{

    flex-direction:column;

}

.actions a{

    width:100%;

    text-align:center;

}

.quick-actions{

    padding:20px;

}

}

</style>

</head>

<body>

<div class="container">

<?php include("navbar.php"); ?>

<h1 class="page-title">

Welcome,

<?php echo htmlspecialchars($fullname); ?>

</h1>

<p class="subtitle">

Manager Dashboard

</p>

<div class="cards">

<div class="card">

<h2>

<?php echo $totalUsers; ?>

</h2>

<p>

System Users

</p>

</div>

<div class="card">

<h2>

<?php echo $totalVoters; ?>

</h2>

<p>

Registered Voters

</p>

</div>

</div>

<div class="quick-actions">

<h3>

Available Actions

</h3>

<div class="actions">

<a href="view_users.php">

View Users

</a>

</div>

</div>

</div>

</body>

</html>

<?php

mysqli_close($conn);

?>