<?php

session_start();

include("employee_db_connection.php");

$message = "";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if(empty($username) || empty($password)){

        $message = "<span style='color:red;'>Please enter your username and password.</span>";

    }

    else{

        $stmt = $conn->prepare(

            "SELECT id, fullname, username, password
             FROM employees
             WHERE username=?"

        );

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 1){

            $row = $result->fetch_assoc();

            if(password_verify($password, $row['password'])){

                $_SESSION['employee_id'] = $row['id'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['username'] = $row['username'];

                // Redirect to the Employee Dashboard
                header("Location: employee_dashboard.php");
                exit();

            }

            else{

                $message = "<span style='color:red;'>Incorrect password.</span>";

            }

        }

        else{

            $message = "<span style='color:red;'>Username not found.</span>";

        }

        $stmt->close();

    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Employee Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{

    margin:0;
    padding:20px;

    font-family:'Poppins', sans-serif;

    background:#eef1e8;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;

}

.container{

    width:430px;
    max-width:95%;

    background:#b8d98a;

    padding:35px;

    border-radius:35px;

    position:relative;

    overflow:hidden;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

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

    width:110px;
    height:110px;

    background:rgba(255,255,255,.10);

    border-radius:50%;

    bottom:-40px;
    left:-40px;

}

.content{

    position:relative;

    z-index:2;

}

.icon{

    width:80px;
    height:80px;

    margin:auto;
    margin-bottom:25px;

    background:white;

    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:34px;

}

h1{

    text-align:center;

    color:#245000;

    margin-bottom:10px;

}

.subtitle{

    text-align:center;

    font-size:13px;

    color:#4b5d36;

    margin-bottom:25px;

}

.message{

    text-align:center;

    margin-bottom:20px;

    font-size:13px;

    font-weight:500;

}

label{

    display:block;

    margin-top:15px;
    margin-bottom:6px;

    color:#466128;

    font-size:13px;

    font-weight:500;

}

input{

    width:100%;

    padding:14px;

    border:none;

    border-radius:30px;

    font-family:'Poppins',sans-serif;

    font-size:13px;

    outline:none;

    box-sizing:border-box;

}

button{

    width:100%;

    padding:15px;

    margin-top:28px;

    border:none;

    border-radius:30px;

    background:#245000;

    color:white;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

button:hover{

    background:#336600;

}

@media(max-width:600px){

.container{

padding:25px;

}

}

</style>

</head>

<body>

<div class="container">

<div class="circle1"></div>

<div class="circle2"></div>

<div class="content">

<div class="icon">

🔐

</div>

<h1>Employee Login</h1>

<p class="subtitle">

Sign in to access the Employee Records Management System.

</p>

<div class="message">

<?php echo $message; ?>

</div>

<form method="POST">

<label>Username</label>

<input
type="text"
name="username"
placeholder="Enter Username"
required>

<label>Password</label>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<button
type="submit"
name="login">

Login

</button>

</form>

</div>

</div>

</body>

</html>