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

if(isset($_POST["update"])){

    $id = (int)$_POST["id"];

    $fullname = trim($_POST["fullname"]);

    $username = trim($_POST["username"]);

    $role = trim($_POST["role"]);

    if(
        !empty($fullname) &&
        !empty($username) &&
        !empty($role)
    ){

        $stmt = mysqli_prepare(

            $conn,

            "UPDATE users
             SET fullname = ?, username = ?, role = ?
             WHERE id = ?"

        );

        mysqli_stmt_bind_param(

            $stmt,

            "sssi",

            $fullname,

            $username,

            $role,

            $id

        );

        if(mysqli_stmt_execute($stmt)){

            $message = "User updated successfully.";

        }else{

            $message = "Failed to update user.";

        }

        mysqli_stmt_close($stmt);

    }else{

        $message = "All fields are required.";

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

<title>CiviVote Kenya | Edit User</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    width:95%;

    max-width:1200px;

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

}

th{

    background:#245000;

    color:white;

    padding:12px;

}

td{

    padding:12px;

    text-align:center;

    border-bottom:1px solid #e5e5e5;

}

tr:hover{

    background:#f6f9f2;

}

.input-box{

    width:170px;

    padding:8px;

    border:1px solid #ccc;

    border-radius:8px;

    font-family:'Poppins',sans-serif;

}

select{

    width:150px;

    padding:8px;

    border:1px solid #ccc;

    border-radius:8px;

    font-family:'Poppins',sans-serif;

}

.update-btn{

    background:#245000;

    color:white;

    border:none;

    padding:8px 20px;

    border-radius:8px;

    cursor:pointer;

    font-family:'Poppins',sans-serif;

}

.update-btn:hover{

    background:#336600;

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

Edit Users

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

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<form method="POST">

<td>

<?php echo $row["id"]; ?>

<input

type="hidden"

name="id"

value="<?php echo $row["id"]; ?>"

>

</td>

<td>

<input

class="input-box"

type="text"

name="fullname"

value="<?php echo htmlspecialchars($row["fullname"]); ?>"

required

>

</td>

<td>

<input

class="input-box"

type="text"

name="username"

value="<?php echo htmlspecialchars($row["username"]); ?>"

required

>

</td>

<td>

<select name="role">

<option value="superadmin"

<?php if($row["role"]=="superadmin") echo "selected"; ?>>

Super Admin

</option>

<option value="manager"

<?php if($row["role"]=="manager") echo "selected"; ?>>

Manager

</option>

<option value="voter"

<?php if($row["role"]=="voter") echo "selected"; ?>>

Voter

</option>

</select>

</td>

<td>

<button

class="update-btn"

type="submit"

name="update"

>

Update

</button>

</td>

</form>

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