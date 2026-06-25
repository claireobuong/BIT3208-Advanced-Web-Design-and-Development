<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week5db"
);

$message = "";

if(isset($_POST['submit'])){

   $username = trim($_POST['username']);

$password = password_hash(

    $_POST['password'],

    PASSWORD_DEFAULT

);

$insert = mysqli_query(

    $conn,

    "INSERT INTO users(username, password)

    VALUES('$username','$password')"

);

    if($insert){

        $message = "User added successfully.";

    }else{

        $message = "Failed to add user.";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Add User</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    max-width:450px;

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

    font-weight:600;

    color:#245000;

}
.logo{

    position:absolute;

    top:18px;

    left:22px;

    color:#245000;

    font-size:14px;

    font-weight:600;

    z-index:2;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:24px;

    font-weight:600;

    margin-top:20px;

    margin-bottom:25px;

}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <div class="logo">

    CiviVote Kenya

</div> 

    <div class="content">

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

</body>

</html>