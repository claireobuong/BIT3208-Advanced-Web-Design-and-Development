<?php

session_start();

if(!isset($_SESSION['employee_id'])){

    header("Location: employee_login.php");
    exit();

}

include("employee_db_connection.php");

$message = "";

if(!isset($_GET['id'])){

    header("Location: view_employees.php");
    exit();

}

$id = intval($_GET['id']);

$stmt = $conn->prepare(

    "SELECT * FROM employees WHERE id=?"

);

$stmt->bind_param("i",$id);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows != 1){

    header("Location: view_employees.php");
    exit();

}

$employee = $result->fetch_assoc();

if(isset($_POST['update'])){

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $username = trim($_POST['username']);

    $update = $conn->prepare(

        "UPDATE employees
        SET fullname=?,
            email=?,
            department=?,
            username=?
        WHERE id=?"

    );

    $update->bind_param(

        "ssssi",

        $fullname,
        $email,
        $department,
        $username,
        $id

    );

    if($update->execute()){

        $message = "Employee updated successfully.";

        $employee['fullname'] = $fullname;
        $employee['email'] = $email;
        $employee['department'] = $department;
        $employee['username'] = $username;

    }

    else{

        $message = "Update failed.";

    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Employee</title>

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

    width:500px;
    max-width:95%;

    background:#b8d98a;

    padding:35px;

    border-radius:35px;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

    position:relative;

}

.circle1{

    position:absolute;

    width:150px;
    height:150px;

    background:rgba(255,255,255,.12);

    border-radius:50%;

    top:-50px;
    right:-50px;

}

.circle2{

    position:absolute;

    width:100px;
    height:100px;

    background:rgba(255,255,255,.10);

    border-radius:50%;

    bottom:-35px;
    left:-35px;

}

.content{

    position:relative;

    z-index:2;

}

.icon{

    width:80px;
    height:80px;

    margin:auto;
    margin-bottom:20px;

    background:white;

    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:35px;

}

h1{

    text-align:center;

    color:#245000;

    margin-bottom:10px;

}

.subtitle{

    text-align:center;

    color:#35551f;

    font-size:13px;

    margin-bottom:25px;

}

.message{

    text-align:center;

    color:#245000;

    font-weight:600;

    margin-bottom:20px;

}

label{

    display:block;

    margin-top:15px;

    margin-bottom:6px;

    color:#35551f;

    font-size:13px;

    font-weight:500;

}

input{

    width:100%;

    padding:14px;

    border:none;

    border-radius:30px;

    box-sizing:border-box;

    font-family:'Poppins',sans-serif;

    font-size:13px;

    outline:none;

}

.buttons{

    display:flex;

    justify-content:space-between;

    margin-top:30px;

    gap:15px;

}

button{

    flex:1;

    padding:14px;

    border:none;

    border-radius:30px;

    background:#245000;

    color:white;

    font-size:14px;

    cursor:pointer;

}

button:hover{

    background:#336600;

}

.back{

    flex:1;

    text-decoration:none;

    text-align:center;

    background:#666;

    color:white;

    padding:14px;

    border-radius:30px;

}

.back:hover{

    background:#555;

}

</style>

</head>

<body>

<div class="container">

<div class="circle1"></div>

<div class="circle2"></div>

<div class="content">

<div class="icon">

✏️

</div>

<h1>Edit Employee</h1>

<p class="subtitle">

Update employee information.

</p>

<div class="message">

<?php echo $message; ?>

</div>

<form method="POST">

<label>Full Name</label>

<input
type="text"
name="fullname"
value="<?php echo htmlspecialchars($employee['fullname']); ?>"
required>

<label>Email</label>

<input
type="email"
name="email"
value="<?php echo htmlspecialchars($employee['email']); ?>"
required>

<label>Department</label>

<input
type="text"
name="department"
value="<?php echo htmlspecialchars($employee['department']); ?>"
required>

<label>Username</label>

<input
type="text"
name="username"
value="<?php echo htmlspecialchars($employee['username']); ?>"
required>

<div class="buttons">

<a
class="back"
href="view_employees.php">

Back

</a>

<button
type="submit"
name="update">

Update Employee

</button>

</div>

</form>

</div>

</div>

</body>

</html>