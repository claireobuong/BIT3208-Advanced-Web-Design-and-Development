<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week6db"
);

if(!$conn){

    die("Connection failed: " . mysqli_connect_error());

}

$message = "";

if(isset($_POST['submit'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($username) || empty($password)){

        $message = "All fields are required.";

    }else{

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO users(username, password)
             VALUES(?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "ss",
            $username,
            $hashedPassword
        );

        if(mysqli_stmt_execute($stmt)){

            $message = "User added successfully.";

        }else{

            $message = "Failed to add user.";

        }

        mysqli_stmt_close($stmt);

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Add User</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    width:95%;

    max-width:1100px;

    padding:30px;

}

.form-box{

    width:420px;

    margin:30px auto 0 auto;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:24px;

    font-weight:600;

    margin-bottom:25px;

}

.message{

    margin-top:20px;

    text-align:center;

    font-size:14px;

    font-weight:600;

    color:#245000;

}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <?php include("navbar.php"); ?>

    <div class="content">

        <div class="form-box">

            <h2 class="page-title">

                Add User

            </h2>

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
                    name="submit"
                >

                    Save User

                </button>

            </form>

            <div class="message">

                <?php

                echo $message;

                ?>

            </div>

        </div>

    </div>

</div>

</body>

</html>