<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;

}

.public-navbar{

    width:100%;
    background:#245000;
    border-radius:18px;
    padding:18px 30px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:35px;

    color:white;

}

.public-logo{

    display:flex;
    align-items:center;
    gap:15px;

}

.public-logo img{

    width:65px;
    height:65px;
    object-fit:contain;
    border-radius:8px;

}

.public-logo-text h2{

    font-size:28px;
    font-weight:600;

}

.public-logo-text span{

    font-size:13px;
    opacity:.85;

}

.public-menu{

    display:flex;
    align-items:center;
    gap:35px;
    flex-wrap:wrap;

}

.public-menu a{

    text-decoration:none;
    color:white;
    font-size:15px;
    transition:.3s;

}

.public-menu a:hover{

    color:#d7f5a8;

}

.login-btn{

    background:white;
    color:#245000 !important;

    padding:12px 22px;

    border-radius:12px;

    font-weight:600;

}

.login-btn:hover{

    background:#f2f2f2;

}

@media(max-width:900px){

.public-navbar{

    flex-direction:column;
    align-items:flex-start;
    gap:20px;

}

.public-menu{

    width:100%;
    flex-direction:column;
    align-items:flex-start;
    gap:12px;

}

.login-btn{

    text-align:center;
    width:100%;

}

}

</style>

</head>

<body>

<div class="public-navbar">

<div class="public-logo">

<img
src="images/logo.jpg"
alt="CiviVote Kenya Logo"
>

<div class="public-logo-text">

<h2>CiviVote Kenya</h2>

<span>Voter Registration System</span>

</div>

</div>

<div class="public-menu">

<a href="index.php">Home</a>

<a href="about.php">About</a>

<a href="services.php">Services</a>

<a href="training.php">Voter Education</a>

<a href="contact.php">Contact</a>

<a href="login.php" class="login-btn">Login</a>

</div>

</div>

</body>

</html>