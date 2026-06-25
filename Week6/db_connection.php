<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week6db"
);

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Database Connection</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    font-family:'Poppins',sans-serif;

    background:#eef1e8;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;

    padding:25px;
}

/* SMALL LOGO */

.logo{

    position:absolute;

    top:20px;
    left:25px;

    font-size:15px;

    font-weight:600;

    color:#245000;

}

/* MAIN CARD */

.container{

    width:100%;
    max-width:650px;

    background:#b8d98a;

    border-radius:30px;

    padding:35px;

    position:relative;

    overflow:hidden;

    box-shadow:
    0 10px 30px rgba(0,0,0,.08);

}

/* DECORATION */

.circle1{

    position:absolute;

    width:170px;
    height:170px;

    background:rgba(255,255,255,.18);

    border-radius:50%;

    top:-60px;
    right:-60px;

}

.circle2{

    position:absolute;

    width:120px;
    height:120px;

    background:rgba(255,255,255,.15);

    border-radius:50%;

    bottom:-40px;
    left:-40px;

}

/* HEADER */

.header{

    position:relative;

    z-index:2;

}

.header h1{

    color:#245000;

    font-size:28px;

    margin-bottom:8px;

}

.header p{

    color:#466128;

    font-size:14px;

    margin-bottom:25px;

}

/* GRID */

.info-grid{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:18px;

    position:relative;

    z-index:2;

}

.box{

    background:white;

    border-radius:20px;

    padding:20px;

    box-shadow:
    0 4px 12px rgba(0,0,0,.05);

}

.full-box{

    margin-top:18px;

}

.title{

    color:#2d6500;

    font-size:13px;

    font-weight:600;

    margin-bottom:8px;

}

.content{

    color:#333;

    font-size:15px;

    line-height:1.6;

}

/* STATUS */

.status{

    margin-top:25px;

    text-align:center;

    position:relative;

    z-index:2;

}

.success{

    display:inline-block;

    background:white;

    color:#1f7a1f;

    padding:12px 28px;

    border-radius:30px;

    font-weight:600;

}

.error{

    display:inline-block;

    background:white;

    color:#d32f2f;

    padding:12px 28px;

    border-radius:30px;

    font-weight:600;

}

/* FOOTER */

.footer{

    margin-top:25px;

    text-align:center;

    color:#35551f;

    font-size:12px;

    position:relative;

    z-index:2;

}

@media(max-width:700px){

.info-grid{

    grid-template-columns:1fr;

}

.container{

    padding:25px;

}

}

</style>

</head>

<body>

<div class="logo">
    CiviVote Kenya
</div>

<div class="container">

    <div class="circle1"></div>
    <div class="circle2"></div>

    <div class="header">

        <h1>Database Connection</h1>

        <p>
            PHP and MySQL Integration Test
        </p>

    </div>

    <div class="info-grid">

        <div class="box">

            <div class="title">
                Server Name
            </div>

            <div class="content">
                localhost
            </div>

        </div>

        <div class="box">

            <div class="title">
                Database Name
            </div>

            <div class="content">
                week6db
            </div>

        </div>

    </div>

    <div class="box full-box">

        <div class="title">
            Connection Information
        </div>

        <div class="content">

            Username: root <br><br>

            Password: Empty <br><br>

            Connection Type: PHP + MySQL

        </div>

    </div>

    <div class="status">

        <?php

        if($conn){

            echo "<div class='success'>
                    Connected Successfully
                  </div>";

        }else{

            echo "<div class='error'>
                    Connection Failed
                  </div>";

        }

        ?>

    </div>

    <div class="footer">

        Database connection successfully tested using PHP.

    </div>

</div>

</body>

</html>