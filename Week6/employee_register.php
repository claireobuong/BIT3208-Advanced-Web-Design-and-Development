<?php

include("employee_db_connection.php");

$message = "";

if(isset($_POST['register'])){

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(
        empty($fullname) ||
        empty($email) ||
        empty($department) ||
        empty($username) ||
        empty($password) ||
        empty($confirm_password)
    ){

        $message = "<span style='color:red;'>Please fill in all fields.</span>";

    }

    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $message = "<span style='color:red;'>Please enter a valid email address.</span>";

    }

    elseif($password != $confirm_password){

        $message = "<span style='color:red;'>Passwords do not match.</span>";

    }

    else{

        $check = $conn->prepare(
            "SELECT id FROM employees WHERE email=? OR username=?"
        );

        $check->bind_param(
            "ss",
            $email,
            $username
        );

        $check->execute();

        $check->store_result();

        if($check->num_rows > 0){

            $message = "<span style='color:red;'>Email or Username already exists.</span>";

        }

        else{

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $insert = $conn->prepare(

                "INSERT INTO employees
                (fullname,email,department,username,password)

                VALUES(?,?,?,?,?)"

            );

            $insert->bind_param(

                "sssss",

                $fullname,
                $email,
                $department,
                $username,
                $hashed_password

            );

            if($insert->execute()){

                $message = "<span style='color:green;'>Employee Registered Successfully.</span>";

            }

            else{

                $message = "<span style='color:red;'>Registration failed.</span>";

            }

            $insert->close();

        }

        $check->close();

    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Employee Registration</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body{

    margin:0;
    padding:20px;

    font-family:'Poppins', sans-serif;

    background:#eef1e8;

    display:flex;
    justify-content:center;
    align-items:center;

    min-height:100vh;
}

.container{

    width:480px;
    max-width:95%;

    background:#b8d98a;

    padding:35px;

    border-radius:35px;

    position:relative;

    overflow:hidden;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);
}

.circle1{

    position:absolute;

    width:160px;
    height:160px;

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

.content{

    position:relative;
    z-index:2;
}

.icon-circle{

    width:80px;
    height:80px;

    background:white;

    border-radius:50%;

    margin:auto;
    margin-bottom:25px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:34px;
}

h1{

    text-align:center;

    color:#245000;

    font-size:28px;

    margin-bottom:8px;
}

.subtitle{

    text-align:center;

    color:#4b5d36;

    font-size:13px;

    margin-bottom:25px;

    line-height:1.6;
}

.message{

    text-align:center;

    margin-bottom:18px;

    font-size:13px;

    font-weight:500;
}

label{

    display:block;

    margin-top:15px;
    margin-bottom:6px;

    color:#466128;

    font-size:13px;

    font-weight:500;
}

input,
select{

    width:100%;

    padding:14px;

    border:none;

    border-radius:30px;

    background:white;

    font-size:13px;

    font-family:'Poppins', sans-serif;

    outline:none;

    box-sizing:border-box;
}

select{

    cursor:pointer;
}

button{

    width:100%;

    padding:15px;

    margin-top:28px;

    border:none;

    border-radius:30px;

    background:#245000;

    color:white;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;
}

button:hover{

    background:#336600;
}

@media(max-width:600px){

    .container{

        padding:25px;

        border-radius:25px;
    }

    h1{

        font-size:24px;
    }

}
    </style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>
    <div class="circle2"></div>

    <div class="content">

        <div class="icon-circle">
            👨‍💼
        </div>

        <h1>Employee Registration</h1>

        <p class="subtitle">
            Register new employees into the Employee Records Management System.
        </p>

        <div class="message">
            <?php echo $message; ?>
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

            <label>Department</label>

            <select name="department" required>

                <option value="">Select Department</option>

                <option>Human Resources</option>

                <option>Finance</option>

                <option>Information Technology</option>

                <option>Marketing</option>

                <option>Operations</option>

            </select>

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Choose Username"
                required
            >

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Enter Password"
                required
            >

            <label>Confirm Password</label>

            <input
                type="password"
                name="confirm_password"
                placeholder="Confirm Password"
                required
            >

            <button
                type="submit"
                name="register"
            >
                Register Employee
            </button>

        </form>

    </div>

</div>

</body>

</html>