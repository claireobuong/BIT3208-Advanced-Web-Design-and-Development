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

if(!$conn){

    die("Connection failed: " . mysqli_connect_error());

}

$message = "";

if(isset($_GET["delete"])){

    $id = (int)$_GET["delete"];

    if($id > 0){

        $stmt = mysqli_prepare(

            $conn,

            "DELETE FROM users
             WHERE id = ?"

        );

        mysqli_stmt_bind_param(

            $stmt,

            "i",

            $id

        );

        if(mysqli_stmt_execute($stmt)){

            $message = "User deleted successfully.";

        }else{

            $message = "Failed to delete user.";

        }

        mysqli_stmt_close($stmt);

    }

}

$stmt = mysqli_prepare(

    $conn,

    "SELECT id, fullname, username, role
     FROM users
     ORDER BY id ASC"

);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Delete User</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    width:95%;

    max-width:1200px;

    margin:auto;

    padding:30px;

}

.table-box{

    width:100%;

    margin:30px auto;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:24px;

    font-weight:600;

    margin-bottom:25px;

}

.message{

    text-align:center;

    color:#245000;

    font-size:14px;

    font-weight:600;

    margin-bottom:20px;

}

table{

    width:100%;

    border-collapse:collapse;

    background:white;

    border-radius:20px;

    overflow:hidden;

    display:block;

    overflow-x:auto;

    white-space:nowrap;

}

th{

    background:#245000;

    color:white;

    padding:12px;

    font-size:13px;

}

td{

    padding:12px;

    text-align:center;

    border-bottom:1px solid #e5e5e5;

    font-size:13px;

}

tr:hover{

    background:#f6f9f2;

}

.role-badge{

    display:inline-block;

    padding:5px 12px;

    border-radius:15px;

    color:white;

    font-size:12px;

    font-weight:600;

}

.superadmin{

    background:#c0392b;

}

.manager{

    background:#f39c12;

}

.voter{

    background:#27ae60;

}

.delete-btn{

    display:inline-block;

    padding:8px 18px;

    background:#c0392b;

    color:white;

    text-decoration:none;

    border-radius:8px;

    font-size:13px;

    transition:.3s;

}

.delete-btn:hover{

    background:#922b21;

}

.empty-message{

    text-align:center;

    padding:20px;

    color:#666;

    font-size:14px;

}

/* ==========================================
   Responsive Design
========================================== */

@media (max-width:1024px){

.container{

    padding:25px;

}

}

@media (max-width:768px){

.container{

    width:100%;

    padding:20px;

}

.page-title{

    font-size:22px;

}

table{

    font-size:12px;

}

th,
td{

    padding:10px;

}

.delete-btn{

    padding:7px 14px;

    font-size:12px;

}

.role-badge{

    font-size:11px;

    padding:4px 10px;

}

}

@media (max-width:480px){

.container{

    padding:15px;

}

.page-title{

    font-size:20px;

}

.delete-btn{

    width:100%;

    text-align:center;

    padding:10px;

}

.role-badge{

    font-size:10px;

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

<div class="table-box">

<h2 class="page-title">

Delete User

</h2>

<?php

if($message != ""){

?>

<div class="message">

<?php echo htmlspecialchars($message); ?>

</div>

<?php

}

?>

<table>

<tr>

<th>ID</th>

<th>Full Name</th>

<th>Username</th>

<th>Role</th>

<th>Action</th>

</tr>

<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<?php echo $row["id"]; ?>

</td>

<td>

<?php echo htmlspecialchars($row["fullname"]); ?>

</td>

<td>

<?php echo htmlspecialchars($row["username"]); ?>

</td>

<td>

<span class="role-badge <?php echo $row["role"]; ?>">

<?php echo ucfirst($row["role"]); ?>

</span>

</td>

<td>

<?php

if($row["id"] == 1){

?>

<span style="color:#888;font-weight:600;">

Protected

</span>

<?php

}else{

?>

<a

class="delete-btn"

href="delete_user.php?delete=<?php echo $row["id"]; ?>"

onclick="return confirm('Are you sure you want to delete this user?');"

>

Delete

</a>

<?php

}

?>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="5" class="empty-message">

No users found.

</td>

</tr>

<?php

}

?>

</table>

</div>

</div>

</div>

</body>

</html>

<?php

mysqli_stmt_close($stmt);

mysqli_close($conn);

?>