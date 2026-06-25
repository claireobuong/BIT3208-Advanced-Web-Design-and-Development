<?php

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $messageText = htmlspecialchars($_POST["message"]);

    $message = "Message submitted successfully.";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Contact</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    width:96%;

    max-width:1400px;

    padding:40px;

}

.content{

    width:100%;

}

.page-heading{

    text-align:center;

    background:#245000;

    color:white;

    padding:14px;

    border-radius:15px;

    font-size:24px;

    font-weight:600;

    margin-bottom:30px;

}

form{

    max-width:750px;

    margin:0 auto;

}

label{

    display:block;

    margin-top:18px;

    margin-bottom:8px;

    color:#245000;

    font-weight:500;

}

input{

    width:100%;

    padding:14px;

    border:none;

    border-radius:30px;

    background:white;

    font-size:14px;

    font-family:'Poppins',sans-serif;

    outline:none;

    box-sizing:border-box;

}

textarea{

    width:100%;

    min-height:160px;

    padding:14px;

    border:none;

    border-radius:20px;

    background:white;

    font-size:14px;

    font-family:'Poppins',sans-serif;

    outline:none;

    resize:vertical;

    box-sizing:border-box;

}

button{

    width:100%;

    padding:14px;

    margin-top:20px;

    border:none;

    border-radius:30px;

    background:#245000;

    color:white;

    font-size:15px;

    font-family:'Poppins',sans-serif;

    cursor:pointer;

    transition:.3s;

}

button:hover{

    background:#336600;

}

.message{

    margin-top:20px;

    padding:14px;

    background:white;

    color:#1f7a1f;

    border-radius:12px;

    text-align:center;

    font-weight:600;

}

@media(max-width:768px){

.container{

    width:95%;

    padding:20px;

}

.page-heading{

    font-size:20px;

}

form{

    max-width:100%;

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

        <h1>

            CiviVote Kenya

        </h1>

        <h2 class="page-heading">

            Contact Form

        </h2>

        <form method="POST">

            <label>

                Full Name

            </label>

            <input
                type="text"
                name="name"
                required
            >

            <label>

                Email Address

            </label>

            <input
                type="email"
                name="email"
                required
            >

            <label>

                Subject

            </label>

            <input
                type="text"
                name="subject"
                required
            >

            <label>

                Message

            </label>

            <textarea
                name="message"
                required
            ></textarea>

            <button type="submit">

                Send Message

            </button>

        </form>

        <?php

        if($message != ""){

            echo "<div class='message'>$message</div>";

        }

        ?>

    </div>

<?php include("footer.php"); ?>

</div>

</body>

</html>