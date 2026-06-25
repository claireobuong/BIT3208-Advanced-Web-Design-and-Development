<?php

session_start();

if(
    !isset($_SESSION["user"]) ||
    !isset($_SESSION["role"]) ||
    !isset($_SESSION["user_id"])
){

    header("Location: login.php");

    exit();

}

$conn = mysqli_connect(

    "localhost",

    "root",

    "",

    "week7db"

);

if(!$conn){

    die("Connection failed: " . mysqli_connect_error());

}
$user_id = $_SESSION["user_id"];

$message = "";

$stmt = mysqli_prepare(

    $conn,

    "SELECT fullname, username, role
     FROM users
     WHERE id=?"

);

mysqli_stmt_bind_param(

    $stmt,

    "i",

    $user_id

);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if(isset($_POST["update"])){

    $fullname = trim($_POST["fullname"]);

    $username = trim($_POST["username"]);

    $password = trim($_POST["password"]);

    if(empty($fullname) || empty($username)){

        $message = "Full Name and Username are required.";

    }else{

        $check = mysqli_prepare(

            $conn,

            "SELECT id
             FROM users
             WHERE username=? AND id!=?"

        );

        mysqli_stmt_bind_param(

            $check,

            "si",

            $username,

            $user_id

        );

        mysqli_stmt_execute($check);

        mysqli_stmt_store_result($check);

        if(mysqli_stmt_num_rows($check)>0){

            $message = "Username already exists.";

            mysqli_stmt_close($check);

        }else{

            mysqli_stmt_close($check);

            if(!empty($password)){

                $hashedPassword = password_hash(

                    $password,

                    PASSWORD_DEFAULT

                );

                $update = mysqli_prepare(

                    $conn,

                    "UPDATE users
                     SET fullname=?,
                         username=?,
                         password=?
                     WHERE id=?"

                );

                mysqli_stmt_bind_param(

                    $update,

                    "sssi",

                    $fullname,

                    $username,

                    $hashedPassword,

                    $user_id

                );

            }else{

                $update = mysqli_prepare(

                    $conn,

                    "UPDATE users
                     SET fullname=?,
                         username=?
                     WHERE id=?"

                );

                mysqli_stmt_bind_param(

                    $update,

                    "ssi",

                    $fullname,

                    $username,

                    $user_id

                );

            }

            if(mysqli_stmt_execute($update)){

                $_SESSION["user"] = $username;

                $_SESSION["fullname"] = $fullname;

                $message = "Profile updated successfully.";

            }else{

                $message = "Failed to update profile.";

            }

            mysqli_stmt_close($update);

            $refresh = mysqli_prepare(

                $conn,

                "SELECT fullname, username, role
                 FROM users
                 WHERE id=?"

            );

            mysqli_stmt_bind_param(

                $refresh,

                "i",

                $user_id

            );

            mysqli_stmt_execute($refresh);

            $result = mysqli_stmt_get_result($refresh);

            $user = mysqli_fetch_assoc($result);

            mysqli_stmt_close($refresh);

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | My Profile</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    width:95%;

    max-width:1000px;

    padding:30px;

}

.profile-card{

    max-width:520px;

    margin:30px auto;

    background:white;

    border-radius:20px;

    padding:30px;

    box-shadow:0 8px 20px rgba(0,0,0,.08);

}

.icon{

    font-size:60px;

    text-align:center;

    margin-bottom:15px;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:28px;

    margin-bottom:25px;

}

label{

    display:block;

    margin-top:15px;

    margin-bottom:6px;

    color:#245000;

    font-weight:600;

    font-size:13px;

}

input{

    width:100%;

    padding:13px;

    border:none;

    border-radius:30px;

    background:#f3f3f3;

    font-size:13px;

    font-family:'Poppins',sans-serif;

    outline:none;

    box-sizing:border-box;

}

.role-box{

    width:100%;

    padding:13px;

    border-radius:30px;

    background:#27ae60;

    color:white;

    text-align:center;

    font-weight:600;

    margin-top:5px;

    box-sizing:border-box;

}

button{

    width:100%;

    padding:13px;

    margin-top:25px;

    border:none;

    border-radius:30px;

    background:#245000;

    color:white;

    font-size:14px;

    font-family:'Poppins',sans-serif;

    cursor:pointer;

}

button:hover{

    background:#336600;

}

.message{

    margin-top:20px;

    text-align:center;

    color:#245000;

    font-weight:600;

    font-size:13px;

}

.note{

    margin-top:8px;

    text-align:center;

    color:#666;

    font-size:11px;

}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <?php include("navbar.php"); ?>

    <div class="content">

        <div class="profile-card">

            <div class="icon">

                👤

            </div>

            <h2 class="page-title">

                My Profile

            </h2>

            <form method="POST">

                <label>

                    Full Name

                </label>

                <input
                    type="text"
                    name="fullname"
                    value="<?php echo htmlspecialchars($user["fullname"]); ?>"
                    required
                >

                <label>

                    Username

                </label>

                <input
                    type="text"
                    name="username"
                    value="<?php echo htmlspecialchars($user["username"]); ?>"
                    required
                >

                <label>

                    New Password

                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Leave blank to keep current password"
                >

                <div class="note">

                    Only enter a password if you want to change it.

                </div>

                <label>

                    Role

                </label>

                <div class="role-box">

                    <?php echo ucfirst($user["role"]); ?>

                </div>

                <button
                    type="submit"
                    name="update"
                >

                    Update Profile

                </button>

            </form>

            <?php

            if($message != ""){

                echo "<div class='message'>"
                . htmlspecialchars($message) .
                "</div>";

            }

            ?>

        </div>

    </div>

</div>

</body>

</html>

<?php

mysqli_close($conn);

?>