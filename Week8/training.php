<?php

session_start();

if(
    !isset($_SESSION["user"]) ||
    !isset($_SESSION["role"])
){

    header("Location: login.php");

    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Voter Education</title>

<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
rel="stylesheet">

<link
rel="stylesheet"
href="css/style.css">

<style>

.training-container{

    margin-top:30px;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:32px;

    margin-bottom:15px;

}

.page-subtitle{

    text-align:center;

    color:#466128;

    margin-bottom:40px;

}

.training-grid{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));

    gap:25px;

}

.training-card{

    background:white;

    border-radius:20px;

    padding:25px;

    box-shadow:0 5px 20px rgba(0,0,0,.08);

    transition:.3s;

}

.training-card:hover{

    transform:translateY(-5px);

}

.training-icon{

    font-size:48px;

    margin-bottom:15px;

}

.training-card h3{

    color:#245000;

    margin-bottom:15px;

}

.training-card p{

    color:#555;

    line-height:1.8;

    font-size:14px;

}

.faq-section{

    margin-top:45px;

}

.faq-title{

    text-align:center;

    color:#245000;

    margin-bottom:25px;

}

.faq{

    background:white;

    border-radius:18px;

    padding:20px;

    margin-bottom:18px;

    box-shadow:0 5px 15px rgba(0,0,0,.06);

}

.faq h4{

    color:#245000;

    margin-bottom:10px;

}

.faq p{

    color:#555;

    line-height:1.7;

}

.content{

    width:100%;

}

.training-container{

    width:100%;

}

@media(max-width:768px){

.page-title{

    font-size:26px;

}

.training-card{

    padding:20px;

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

<div class="training-container">

<h1 class="page-title">

Voter Education

</h1>

<p class="page-subtitle">

Learn how to use the CiviVote Kenya system effectively.

</p>

<div class="training-grid">

<div class="training-card">

<div class="training-icon">

📝

</div>

<h3>

Step 1: Register

</h3>

<p>

Create a voter account by providing the required personal information. Your details are securely stored within the system.

</p>

</div>

<div class="training-card">

<div class="training-icon">

🔑

</div>

<h3>

Step 2: Login

</h3>

<p>

Use your registered username and password to access the system securely through the login page.

</p>

</div>

<div class="training-card">

<div class="training-icon">

👤

</div>

<h3>

Step 3: Manage Your Profile

</h3>

<p>

Review your account details and keep your information accurate whenever updates are required.

</p>

</div>

<div class="training-card">

<div class="training-icon">

🛡️

</div>

<h3>

Account Security

</h3>

<p>

Protect your login credentials and always log out after using the system, especially on shared computers.

</p>

</div>

<div class="training-card">

<div class="training-icon">

📱

</div>

<h3>

Access Anywhere

</h3>

<p>

The responsive design allows the system to work smoothly on smartphones, tablets and desktop computers.

</p>

</div>

<div class="training-card">

<div class="training-icon">

✅

</div>

<h3>

Need Assistance?

</h3>

<p>

If you experience any issues while using the system, contact the system administrator for assistance.

</p>

</div>

</div>

<div class="faq-section">

<h2 class="faq-title">

Frequently Asked Questions

</h2>

<div class="faq">

<h4>

Who can access CiviVote Kenya?

</h4>

<p>

Only registered users with valid login credentials can access the system according to their assigned role.

</p>

</div>

<div class="faq">

<h4>

Can I access the system on my phone?

</h4>

<p>

Yes. The system is designed using responsive web design, allowing it to function properly on mobile phones, tablets and desktop computers.

</p>

</div>

<div class="faq">

<h4>

What should I do if I forget my password?

</h4>

<p>

Contact the system administrator, who can assist with resetting your account credentials.

</p>

</div>

</div>

</div>

</div>

<?php include("footer.php"); ?>

</div>

</body>

</html>