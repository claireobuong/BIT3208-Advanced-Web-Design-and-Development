<?php

session_start();

if(!isset($_SESSION['employee_id'])){

    header("Location: employee_login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Employee Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{

    margin:0;
    padding:20px;

    font-family:'Poppins',sans-serif;

    background:#eef1e8;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;

}

.container{

    width:700px;
    max-width:95%;

    background:#b8d98a;

    padding:40px;

    border-radius:35px;

    text-align:center;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

}

.icon{

    width:90px;
    height:90px;

    margin:auto;
    margin-bottom:25px;

    border-radius:50%;

    background:white;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:40px;

}

h1{

    color:#245000;

}

p{

    color:#35551f;

    font-size:15px;

    margin-bottom:35px;

}

.buttons{

    display:flex;

    flex-wrap:wrap;

    justify-content:center;

    gap:15px;

}

.buttons a{

    text-decoration:none;

    background:#245000;

    color:white;

    padding:14px 24px;

    border-radius:30px;

    transition:.3s;

}

.buttons a:hover{

    background:#336600;

}

.logout{

    background:#b22222 !important;

}

.logout:hover{

    background:#8b0000 !important;

}

</style>

</head>

<body>

<div class="container">

<div class="icon">

👨‍💼

</div>

<h1>

Welcome,
<?php echo htmlspecialchars($_SESSION['fullname']); ?>

</h1>

<p>

You have successfully logged into the Employee Records Management System.

</p>

<div class="buttons">

<a href="view_employees.php">

View Employees

</a>

<a href="employee_register.php">

Register Employee

</a>

<a href="search_employee.php">

Search Employee

</a>

<a
class="logout"
href="employee_logout.php">

Logout

</a>

</div>

</div>

</body>

</html>