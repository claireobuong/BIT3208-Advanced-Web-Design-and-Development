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

if(isset($_POST["submit"])){

    $fullname = trim($_POST["fullname"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $role = $_POST["role"];

    if(
        empty($fullname) ||
        empty($username) ||
        empty($password)
    ){

        $message = "All fields are required.";

    }else{

        $check = mysqli_prepare(

            $conn,

            "SELECT id FROM users WHERE username = ?"

        );

        mysqli_stmt_bind_param(

            $check,

            "s",

            $username

        );

        mysqli_stmt_execute($check);

        mysqli_stmt_store_result($check);

        if(mysqli_stmt_num_rows($check) > 0){

            $message = "Username already exists.";

            mysqli_stmt_close($check);

        }else{

            mysqli_stmt_close($check);

            $hashedPassword = password_hash(

                $password,

                PASSWORD_DEFAULT

            );

            $stmt = mysqli_prepare(

                $conn,

                "INSERT INTO users(fullname, username, password, role)
                 VALUES(?, ?, ?, ?)"

            );

            mysqli_stmt_bind_param(

                $stmt,

                "ssss",

                $fullname,
                $username,
                $hashedPassword,
                $role

            );

            if(mysqli_stmt_execute($stmt)){

                $message = "User added successfully.";

            }else{

                $message = "Failed to add user.";

            }

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
    width:100%;
    max-width:500px;
    margin:30px auto 0 auto;
    background:rgba(255,255,255,.12);
    padding:30px;
    border-radius:20px;
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

select{
    width:100%;
    padding:13px;
    border:none;
    border-radius:30px;
    background:white;
    font-size:13px;
    font-family:'Poppins',sans-serif;
    outline:none;
    margin-bottom:15px;
}

button{
    width:100%;
}

/* ---------- Tablet ---------- */

@media (max-width:768px){

.container{
    padding:20px;
}

.form-box{
    padding:25px;
}

.page-title{
    font-size:22px;
}

}

/* ---------- Mobile ---------- */

@media (max-width:480px){

.container{
    width:100%;
    padding:15px;
}

.form-box{
    padding:20px;
    border-radius:15px;
}

.page-title{
    font-size:20px;
}

label{
    font-size:13px;
}

input,
select,
button{
    font-size:14px;
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

        <div class="form-box">

            <h2 class="page-title">

                Add User

            </h2>

            <form method="POST">

                <label>

                    Full Name

                </label>

                <input
                    type="text"
                    name="fullname"
                    placeholder="Enter Full Name"
                    required
                >

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

                <label>

                    User Role

                </label>

                <select name="role">

                    <option value="manager">Manager</option>

                    <option value="voter" selected>Voter</option>

                </select>

                <button
                    type="submit"
                    name="submit"
                >

                    Save User

                </button>

            </form>

            <div class="message">

                <?php echo htmlspecialchars($message); ?>

            </div>

        </div>

    </div>

</div>

</body>

</html>

<?php

mysqli_close($conn);

?>