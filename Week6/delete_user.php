<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week6db"
);

if(!$conn){

    die("Connection failed: " . mysqli_connect_error());

}

$message = "";

if(isset($_GET['delete'])){

    $id = (int)$_GET['delete'];

    if($id > 0){

        $stmt = mysqli_prepare(

            $conn,

            "DELETE FROM users WHERE id = ?"

        );

        mysqli_stmt_bind_param(

            $stmt,

            "i",

            $id

        );

        if(mysqli_stmt_execute($stmt)){

            $message = "User deleted successfully.";

        }else{

            $message = "Failed to delete user.";

        }

        mysqli_stmt_close($stmt);

    }

}

$stmt = mysqli_prepare(

    $conn,

    "SELECT id, username FROM users"

);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>CiviVote Kenya | Delete User</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    width:95%;

    max-width:1100px;

    padding:30px;

}

.table-box{

    width:90%;

    margin:30px auto 0 auto;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:22px;

    font-weight:600;

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

.delete-btn{

    display:inline-block;

    padding:8px 18px;

    background:#c0392b;

    color:white;

    text-decoration:none;

    border-radius:8px;

    font-size:13px;

    transition:.3s;

}

.delete-btn:hover{

    background:#a93226;

}

.empty-message{

    text-align:center;

    padding:20px;

    color:#666;

    font-size:14px;

}

</style>

</head>

<body>

<div class="container">

    <div class="circle1"></div>

    <div class="circle2"></div>

    <?php include("navbar.php"); ?>

    <div class="content">

        <div class="table-box">

            <h2 class="page-title">

                Delete User

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

                    <th>Password</th>

                    <th>Delete</th>

                </tr>

                <?php

                if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){

                ?>

                <tr>

                    <td>

                        <?php echo $row['id']; ?>

                    </td>

                    <td>

                        <?php echo htmlspecialchars($row['username']); ?>

                    </td>

                    <td>

                        ********

                    </td>

                    <td>

                        <a

                            class="delete-btn"

                            href="delete_user.php?delete=<?php echo $row['id']; ?>"

                            onclick="return confirm('Are you sure you want to delete this user?');"

                        >

                            Delete

                        </a>

                    </td>

                </tr>

                <?php

                    }

                }else{

                ?>

                <tr>

                    <td colspan="4" class="empty-message">

                        No users found.

                    </td>

                </tr>

                <?php

                }

                ?>

            </table>

        </div>

    </div>

</div>

</body>

</html>

<?php

mysqli_stmt_close($stmt);

mysqli_close($conn);

?>