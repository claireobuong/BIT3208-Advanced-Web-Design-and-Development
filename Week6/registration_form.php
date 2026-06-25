<?php

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fullname = htmlspecialchars($_POST["fullname"]);
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);

    $message = "Registration submitted successfully.";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Registration</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    max-width:520px;

}

.message{

    margin-top:18px;

    padding:12px;

    background:white;

    color:#1f7a1f;

    border-radius:12px;

    text-align:center;

    font-weight:600;

}
.page-heading{

    text-align:center;

    color:#245000;

    font-size:24px;

    font-weight:600;

    margin-bottom:25px;

    letter-spacing:0.5px;

}

</style>

</head>

<body>

<div class="container">

<div class="circle1"></div>

<div class="circle2"></div>

<div class="content">

<h1>

CiviVote Kenya

</h1>

<h2 class="page-heading">

Registration Form

</h2>

<form method="POST">

<label>

Full Name

</label>

<input
type="text"
name="fullname"
required>

<label>

Email Address

</label>

<input
type="email"
name="email"
required>

<label>

Username

</label>

<input
type="text"
name="username"
required>

<button type="submit">

Register

</button>

</form>

<?php

if($message!=""){

echo "<div class='message'>$message</div>";

}

?>

</div>

</div>

</body>

</html>