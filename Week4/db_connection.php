<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Database Connection</title>

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

/* MAIN CARD */

.container{
    width:720px;
    background:#b8d98a;
    border-radius:35px;
    padding:35px;
    box-sizing:border-box;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);

    position:relative;
    overflow:hidden;
}

/* BACKGROUND CIRCLES */

.circle1{
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,255,255,0.18);
    border-radius:50%;
    top:-60px;
    right:-60px;
}

.circle2{
    position:absolute;
    width:120px;
    height:120px;
    background:rgba(255,255,255,0.15);
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
    font-size:30px;
    margin-bottom:6px;
    font-weight:600;
    letter-spacing:-0.5px;
}

.header p{
    color:#466128;
    font-size:13px;
    margin-bottom:30px;
    font-weight:400;
}

/* INFO GRID */

.info-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;

    position:relative;
    z-index:2;
}

/* BOXES */

.box{
    background:white;
    border-radius:24px;
    padding:22px;

    box-shadow:
    0 4px 15px rgba(0,0,0,0.06);
}

/* FULL BOX */

.full-box{
    margin-top:18px;
    position:relative;
    z-index:2;
}

/* TITLES */

.title{
    color:#336600;
    font-size:13px;
    font-weight:500;
    margin-bottom:10px;
}

/* CONTENT */

.content{
    color:#222;
    font-size:16px;
    font-weight:500;
    line-height:1.5;
}

/* STATUS */

.status{
    margin-top:20px;
    text-align:center;
    position:relative;
    z-index:2;
}

.success{
    background:white;
    display:inline-block;
    padding:14px 28px;
    border-radius:40px;
    color:#1d6b00;
    font-size:15px;
    font-weight:600;

    box-shadow:
    0 4px 12px rgba(0,0,0,0.05);
}

.error{
    background:white;
    display:inline-block;
    padding:14px 28px;
    border-radius:40px;
    color:red;
    font-size:15px;
    font-weight:600;

    box-shadow:
    0 4px 12px rgba(0,0,0,0.05);
}

/* FOOTER */

.footer{
    margin-top:22px;
    color:#35551f;
    font-size:11px;
    text-align:center;
    position:relative;
    z-index:2;
    opacity:0.8;
}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>
    <div class="circle2"></div>

    <!-- HEADER -->

    <div class="header">

        <h1>Database Connection</h1>

        <p>
            PHP and MySQL Integration Test
        </p>

    </div>

    <!-- INFO GRID -->

    <div class="info-grid">

        <!-- BOX 1 -->

        <div class="box">

            <div class="title">
                Server Name
            </div>

            <div class="content">
                localhost
            </div>

        </div>

        <!-- BOX 2 -->

        <div class="box">

            <div class="title">
                Database Name
            </div>

            <div class="content">
                week3db
            </div>

        </div>

    </div>

    <!-- FULL BOX -->

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

    <!-- STATUS -->

    <div class="status">

        <?php

        $conn = mysqli_connect(
            "localhost",
            "root",
            "",
            "week3db"
        );

        if($conn){

            echo "<div class='success'>
                    Connected Successfully
                  </div>";

        } else {

            echo "<div class='error'>
                    Connection Failed
                  </div>";

        }

        ?>

    </div>

    <!-- FOOTER -->

    <div class="footer">

        Database Connection Successfully Tested Using PHP

    </div>

</div>

</body>

</html>