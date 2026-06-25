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

    max-width:560px;

}

.page-heading{

    text-align:center;

    background:#245000;

    color:white;

    padding:12px;

    border-radius:15px;

    font-size:22px;

    font-weight:600;

    margin-bottom:25px;

}

textarea{

    width:100%;

    min-height:120px;

    resize:vertical;

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

</div>

</body>

</html>