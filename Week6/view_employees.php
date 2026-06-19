<?php

session_start();

if(!isset($_SESSION['employee_id'])){

    header("Location: employee_login.php");
    exit();

}

include("employee_db_connection.php");

$result = mysqli_query(

    $conn,

    "SELECT * FROM employees ORDER BY id DESC"

);

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>View Employees</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{

    margin:0;
    padding:30px;

    font-family:'Poppins',sans-serif;

    background:#eef1e8;

}

.container{

    width:95%;

    max-width:1200px;

    margin:auto;

    background:#b8d98a;

    padding:35px;

    border-radius:35px;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

}

h1{

    text-align:center;

    color:#245000;

    margin-bottom:10px;

}

.subtitle{

    text-align:center;

    color:#35551f;

    margin-bottom:30px;

}

.top-buttons{

    display:flex;

    justify-content:space-between;

    margin-bottom:25px;

    flex-wrap:wrap;

    gap:10px;

}

.top-buttons a{

    text-decoration:none;

    background:#245000;

    color:white;

    padding:12px 22px;

    border-radius:25px;

    font-size:14px;

}

.top-buttons a:hover{

    background:#336600;

}

table{

    width:100%;

    border-collapse:collapse;

    background:white;

    border-radius:20px;

    overflow:hidden;

}

th{

    background:#245000;

    color:white;

    padding:15px;

}

td{

    padding:15px;

    text-align:center;

    border-bottom:1px solid #dddddd;

}

tr:hover{

    background:#f5f5f5;

}

.action-btn{

    text-decoration:none;

    color:white;

    padding:8px 16px;

    border-radius:20px;

    font-size:12px;

}

.edit{

    background:#2E8B57;

}

.delete{

    background:#B22222;

}

.action-btn:hover{

    opacity:.85;

}

@media(max-width:900px){

table{

display:block;

overflow-x:auto;

}

}

</style>

</head>

<body>

<div class="container">

<h1>Employee Records</h1>

<p class="subtitle">

Viewing all registered employees in the system.

</p>

<div class="top-buttons">

<a href="employee_dashboard.php">

← Dashboard

</a>

<a href="employee_register.php">

+ Register Employee

</a>

</div>

<table>

<tr>

<th>ID</th>

<th>Full Name</th>

<th>Email</th>

<th>Department</th>

<th>Username</th>

<th>Edit</th>

<th>Delete</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['fullname']); ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>

<td><?php echo htmlspecialchars($row['department']); ?></td>

<td><?php echo htmlspecialchars($row['username']); ?></td>

<td>

<a

class="action-btn edit"

href="edit_employee.php?id=<?php echo $row['id']; ?>">

Edit

</a>

</td>

<td>

<a

class="action-btn delete"

href="delete_employee.php?id=<?php echo $row['id']; ?>"

onclick="return confirm('Are you sure you want to delete this employee?');">

Delete

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>