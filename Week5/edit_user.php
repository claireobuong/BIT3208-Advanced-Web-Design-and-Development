<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week5db"
);

$message = "";

if(isset($_POST['update'])){

    $id = (int)$_POST['id'];

    $username = trim($_POST['username']);

    mysqli_query(

        $conn,

        "UPDATE users
        SET username='$username'
        WHERE id='$id'"

    );

    $message = "User updated successfully.";

}

$result = mysqli_query(

    $conn,

    "SELECT * FROM users"

);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Edit User</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    max-width:800px;

    padding:30px;

}

.logo{

    position:absolute;

    top:18px;

    left:22px;

    color:#245000;

    font-size:14px;

    font-weight:600;

    z-index:2;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:22px;

    font-weight:600;

    margin-top:12px;

    margin-bottom:20px;

}

.message{

    text-align:center;

    color:#245000;

    font-size:13px;

    font-weight:600;

    margin-bottom:18px;

}

table{

    width:100%;

    border-collapse:collapse;

    background:white;

    border-radius:20px;

    overflow:hidden;

}

th{

    background:#245000;

    color:white;

    padding:12px;

    font-size:13px;

}

td{

    padding:12px;

    text-align:center;

    border-bottom:1px solid #e5e5e5;

    font-size:13px;

}

tr:hover{

    background:#f6f9f2;

}

.username-input{

    width:170px;

    padding:8px;

    border:1px solid #d8d8d8;

    border-radius:8px;

    font-size:13px;

    font-family:'Poppins',sans-serif;

    outline:none;

}

.username-input:focus{

    border-color:#4f8b1f;

}

.update-btn{

    padding:8px 18px;

    background:#245000;

    color:white;

    border:none;

    border-radius:8px;

    cursor:pointer;

    font-size:13px;

    font-family:'Poppins',sans-serif;

    transition:.3s;

}

.update-btn:hover{

    background:#336600;

}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <div class="logo">

        CiviVote Kenya

    </div>

    <div class="content">

        <h2 class="page-title">

            Edit User

        </h2>

        <?php if($message != ""){ ?>

        <div class="message">

            <?php echo $message; ?>

        </div>

        <?php } ?>

        <table>

            <tr>

                <th>ID</th>

                <th>Username</th>

                <th>Update</th>

            </tr>

            <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <tr>

                <form method="POST">

                    <td>

                        <?php echo $row['id']; ?>

                        <input
                            type="hidden"
                            name="id"
                            value="<?php echo $row['id']; ?>"
                        >

                    </td>

                    <td>

                        <input

                            class="username-input"

                            type="text"

                            name="username"

                            value="<?php echo htmlspecialchars($row['username']); ?>"

                            required

                        >

                    </td>

                    <td>

                        <button

                            class="update-btn"

                            type="submit"

                            name="update"

                        >

                            Update

                        </button>

                    </td>

                </form>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>

</html>