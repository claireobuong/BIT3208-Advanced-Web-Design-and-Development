<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    padding:0;
    font-family:'Poppins', sans-serif;
    background:#eef1e8;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;
}

/* MAIN CONTAINER */

.container{
    width:460px;

    background:#b8d98a;

    padding:45px;

    border-radius:40px;

    position:relative;

    overflow:hidden;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);
}

/* BACKGROUND CIRCLES */

.circle1{
    position:absolute;

    width:170px;
    height:170px;

    background:rgba(255,255,255,0.12);

    border-radius:50%;

    top:-60px;
    right:-60px;
}

.circle2{
    position:absolute;

    width:120px;
    height:120px;

    background:rgba(255,255,255,0.10);

    border-radius:50%;

    bottom:-40px;
    left:-40px;
}

/* CONTENT */

.content{
    position:relative;
    z-index:2;
}

h1{
    text-align:center;

    color:#245000;

    font-size:30px;

    margin-bottom:8px;

    font-weight:600;
}

.subtitle{
    text-align:center;

    color:#4b5d36;

    font-size:13px;

    margin-bottom:35px;

    line-height:1.6;
}

/* ICON */

.icon-circle{
    width:85px;
    height:85px;

    background:white;

    border-radius:50%;

    margin:auto;
    margin-bottom:30px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:34px;
}

/* LABELS */

label{
    display:block;

    color:#466128;

    font-size:12px;

    margin-bottom:8px;
    margin-top:18px;

    font-weight:500;
}

/* INPUTS */

input{
    width:100%;

    padding:15px;

    border:none;

    border-radius:40px;

    background:white;

    font-size:13px;

    font-family:'Poppins', sans-serif;

    outline:none;

    box-sizing:border-box;

    box-shadow:
    0 4px 10px rgba(0,0,0,0.04);
}

/* BUTTON */

button{
    width:100%;

    padding:15px;

    margin-top:30px;

    border:none;

    border-radius:40px;

    background:#245000;

    color:white;

    font-size:14px;

    font-weight:500;

    cursor:pointer;

    transition:0.3s;
}

button:hover{
    background:#336600;
}

/* SMALL CARD */

.info-card{
    margin-top:25px;

    background:rgba(255,255,255,0.18);

    padding:18px;

    border-radius:25px;

    text-align:center;
}

.info-title{
    color:#245000;

    font-size:14px;

    font-weight:600;

    margin-bottom:6px;
}

.info-text{
    color:#35551f;

    font-size:11px;

    line-height:1.7;
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
            Admin Login
        </h1>

        <div class="subtitle">

            Secure login portal for the
            voter registration system.

        </div>

        <form action="dashboard.php" method="POST">

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Enter Username"
                required
            >

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Enter Password"
                required
            >

            <button type="submit">
                Login
            </button>

        </form>

        <div class="info-card">

            <div class="info-title">
                Voter Registration System
            </div>

            <div class="info-text">

                Secure login portal for
                administrator access.

            </div>

        </div>

    </div>

</div>

</body>

</html>