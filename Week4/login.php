<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {

        $message = "Please enter both username and password.";

    } elseif ($username == "admin" && $password == "admin123") {

        $_SESSION["username"] = $username;

        header("Location: dashboard.php");
        exit();

    } else {

        $message = "Invalid username or password.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

/* Login Page Only */

.container{

    max-width:460px;

    padding:28px;

}

.icon-circle{

    width:70px;

    height:70px;

    margin:0 auto 18px;

    border-radius:50%;

    background:#ffffff;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:30px;

}

.content{

    position:relative;

    z-index:2;

}

.content h1{

    text-align:center;

    font-size:28px;

}

.subtitle{

    text-align:center;

    margin-bottom:20px;

}

label{

    margin-top:12px;

}

input{

    border-radius:40px;

}

button{

    border-radius:40px;

    margin-top:18px;

}

.error-message{

    background:#ffffff;

    color:#c62828;

    padding:10px;

    border-radius:10px;

    margin-top:15px;

    text-align:center;

    font-size:13px;

}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <div class="content">

        <div class="icon-circle">

            🔐

        </div>

        <h1>

            CiviVote Kenya

        </h1>

        <div class="subtitle">

            Administrator Login

        </div>

        <form method="POST" action="">

            <label>

                Username

            </label>

            <input
                type="text"
                name="username"
                placeholder="Enter Username"
                value="<?php if(isset($username)) echo htmlspecialchars($username); ?>"
            >

            <label>

                Password

            </label>

            <input
                type="password"
                name="password"
                placeholder="Enter Password"
            >

            <?php if($message != ""){ ?>

                <div class="error-message">

                    <?php echo $message; ?>

                </div>

            <?php } ?>

            <button type="submit">

                Login

            </button>

        </form>

    </div>

</div>

</body>

</html>