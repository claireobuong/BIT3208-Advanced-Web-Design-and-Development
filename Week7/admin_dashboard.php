<?php

session_start();

if(
    !isset($_SESSION["user"]) ||
    !isset($_SESSION["role"])
){

    header("Location: login.php");

    exit();

}

if($_SESSION["role"] != "superadmin"){

    header("Location: login.php");

    exit();

}

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week7db"
);

$fullname = $_SESSION["fullname"];

$totalUsers = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM users")
)["total"];

$totalManagers = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM users WHERE role='manager'")
)["total"];

$totalVoters = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM users WHERE role='voter'")
)["total"];

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Super Administrator Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.cards{

display:grid;

grid-template-columns:repeat(3,1fr);

gap:20px;

margin-top:30px;

}

.card{

background:white;

padding:25px;

border-radius:18px;

text-align:center;

box-shadow:0 5px 20px rgba(0,0,0,.08);

}

.card h2{

font-size:38px;

color:#245000;

margin-bottom:10px;

}

.card p{

font-size:14px;

color:#666;

}

.quick-actions{

margin-top:40px;

background:white;

padding:30px;

border-radius:18px;

box-shadow:0 5px 20px rgba(0,0,0,.08);

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

text-decoration:none;

background:#245000;

color:white;

padding:12px 22px;

border-radius:10px;

transition:.3s;

}

.actions a:hover{

background:#3a7000;

}

</style>

</head>

<body>

<div class="container">

<?php include("navbar.php"); ?>

<h1>

Welcome,

<?php echo htmlspecialchars($fullname); ?>

</h1>

<p>

System overview for the Super Administrator.

</p>

<div class="cards">

<div class="card">

<h2>

<?php echo $totalUsers; ?>

</h2>

<p>Total Users</p>

</div>

<div class="card">

<h2>

<?php echo $totalManagers; ?>

</h2>

<p>Managers</p>

</div>

<div class="card">

<h2>

<?php echo $totalVoters; ?>

</h2>

<p>Registered Voters</p>

</div>

</div>

<div class="quick-actions">

<h3>

Quick Actions

</h3>

<div class="actions">

<a href="add_user.php">

➕ Add User

</a>

<a href="view_users.php">

👥 View Users

</a>

<a href="edit_user.php">

✏️ Edit User

</a>

<a href="delete_user.php">

🗑 Delete User

</a>

</div>

</div>

</div>

</body>

</html>

<?php

mysqli_close($conn);

?>