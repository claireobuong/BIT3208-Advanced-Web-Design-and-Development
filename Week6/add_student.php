<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week6db"
);

$message = "";

if(isset($_POST['submit'])){

    $fullname = $_POST['fullname'];

    $email = $_POST['email'];

    $course = $_POST['course'];

    $insert = mysqli_query(

        $conn,

        "INSERT INTO students(fullname, email, course)

        VALUES('$fullname', '$email', '$course')"
    );

    if($insert){

        $message = "Student Registered Successfully";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Student Registration</title>

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

.container{
    width:400px;

    background:#b8d98a;

    padding:35px;

    border-radius:40px;

    position:relative;

    overflow:hidden;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);
}

.circle1{
    position:absolute;

    width:140px;
    height:140px;

    background:rgba(255,255,255,0.12);

    border-radius:50%;

    top:-60px;
    right:-60px;
}

.circle2{
    position:absolute;

    width:100px;
    height:100px;

    background:rgba(255,255,255,0.10);

    border-radius:50%;

    bottom:-40px;
    left:-40px;
}

.content{
    position:relative;
    z-index:2;
}

.icon-circle{
    width:70px;
    height:70px;

    background:white;

    border-radius:50%;

    margin:auto;
    margin-bottom:30px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:28px;
}

h1{
    text-align:center;

    color:#245000;

    font-size:25px;

    margin-bottom:8px;
}

.subtitle{
    text-align:center;

    color:#4b5d36;

    font-size:13px;

    margin-bottom:35px;

    line-height:1.6;
}

label{
    display:block;

    color:#466128;

    font-size:12px;

    margin-bottom:8px;
    margin-top:18px;

    font-weight:500;
}

input{
    width:100%;

    padding:13px;

    border:none;

    border-radius:40px;

    background:white;

    font-size:13px;

    font-family:'Poppins', sans-serif;

    outline:none;

    box-sizing:border-box;
}

button{
    width:100%;

    padding:13px;

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

.message{
    margin-top:18px;

    text-align:center;

    font-size:12px;

    font-weight:500;

    color:#245000;
}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <div class="content">

        <div class="icon-circle">

            🎓

        </div>

        <h1>

            Student Registration

        </h1>

        <div class="subtitle">

            Register student details
            into the management system.

        </div>

        <form method="POST">

            <label>Full Name</label>

            <input
                type="text"
                name="fullname"
                placeholder="Enter Full Name"
                required
            >

            <label>Email Address</label>

            <input
                type="email"
                name="email"
                placeholder="Enter Email Address"
                required
            >

            <label>Course</label>

            <input
                type="text"
                name="course"
                placeholder="Enter Course"
                required
            >

            <button
                type="submit"
                name="submit"
            >

                Register Student

            </button>

        </form>

        <div class="message">

            <?php echo $message; ?>

        </div>

    </div>

</div>

</body>

</html>