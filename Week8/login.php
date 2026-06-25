<?php

session_start();

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week7db"
);

$message = "";

if(!$conn){

    die("Connection failed: " . mysqli_connect_error());

}

if(isset($_POST["login"])){

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $stmt = mysqli_prepare(

        $conn,

        "SELECT id, fullname, username, password, role
         FROM users
         WHERE username = ?"

    );

    mysqli_stmt_bind_param(

        $stmt,

        "s",

        $username

    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) == 1){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user["password"])){

            session_regenerate_id(true);

            $_SESSION["user_id"] = $user["id"];

            $_SESSION["user"] = $user["username"];

            $_SESSION["fullname"] = $user["fullname"];

            $_SESSION["role"] = $user["role"];

            mysqli_stmt_close($stmt);

            mysqli_close($conn);

            if($user["role"] == "superadmin"){

                header("Location: admin_dashboard.php");

            }elseif($user["role"] == "manager"){

                header("Location: manager_dashboard.php");

            }else{

                header("Location: voter_dashboard.php");

            }

            exit();

        }else{

            $message = "Incorrect password.";

        }

        mysqli_stmt_close($stmt);

    }else{

        $message = "Username not found.";

        if(isset($stmt)){

            mysqli_stmt_close($stmt);

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    padding:0;
    font-family:'Poppins',sans-serif;
    background:#eef1e8;

    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}


.container{

    width:420px;

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

    top:-55px;
    right:-55px;

}

.circle2{

    position:absolute;

    width:110px;
    height:110px;

    background:rgba(255,255,255,.10);

    border-radius:50%;

    bottom:-35px;
    left:-35px;

}

.content{

    position:relative;

    z-index:2;

}

.logo-container{

    display:flex;

    justify-content:center;

    margin-bottom:25px;

}

.login-logo{

    width:120px;

    max-width:100%;

    height:auto;

}

h1{

    text-align:center;

    color:#245000;

    font-size:26px;

    margin-bottom:6px;

}

.subtitle{

    text-align:center;

    color:#4b5d36;

    font-size:12px;

    margin-bottom:25px;

    line-height:1.6;

}

label{

    display:block;

    margin-top:16px;
    margin-bottom:7px;

    color:#466128;

    font-size:12px;

    font-weight:500;

}

input{

    width:100%;

    padding:13px;

    border:none;

    border-radius:30px;

    background:white;

    font-size:13px;

    box-sizing:border-box;

    outline:none;

}

button{

    width:100%;

    padding:13px;

    margin-top:25px;

    border:none;

    border-radius:30px;

    background:#245000;

    color:white;

    font-size:14px;

    font-family:'Poppins',sans-serif;

    cursor:pointer;

}

button:hover{

    background:#336600;

}

.message{

    margin-top:18px;

    text-align:center;

    color:#c62828;

    font-size:13px;

    font-weight:500;

}

.info-card{

    margin-top:20px;

    background:rgba(255,255,255,.18);

    border-radius:20px;

    padding:15px;

    text-align:center;

}

.info-title{

    color:#245000;

    font-size:13px;

    font-weight:600;

    margin-bottom:5px;

}

.info-text{

    color:#35551f;

    font-size:11px;

    line-height:1.6;

}

</style>

</head>

<body>


<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <div class="content">

       <div class="logo-container">

    <img
        src="images/logo.jpg"
        alt="CiviVote Kenya Logo"
        class="login-logo"
    >

</div>

        <h1>

    Welcome Back

</h1>

<div class="subtitle">

    Sign in to access the CiviVote Kenya Voter Registration System.

</div>

        <form method="POST">

            <label>

                Username

            </label>

            <input
                type="text"
                name="username"
                placeholder="Enter Username"
                required
            >

            <label>

                Password

            </label>

            <input
                type="password"
                name="password"
                placeholder="Enter Password"
                required
            >

            <button
                type="submit"
                name="login"
            >

                Login

            </button>

        </form>

        <?php

        if($message != ""){

            echo "<div class='message'>" . htmlspecialchars($message) . "</div>";

        }

        ?>

        <div class="info-card">

            <div class="info-title">

                Secure Authentication

            </div>

            <div class="info-text">

                Login credentials are verified using hashed passwords stored securely in the database.

            </div>

        </div>

    </div>

</div>

</body>

</html>

<?php

mysqli_close($conn);

?>