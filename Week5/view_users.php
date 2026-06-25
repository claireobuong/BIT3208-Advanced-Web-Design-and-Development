<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "week5db"
);

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

<title>CiviVote Kenya | View Users</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<style>

.container{

    max-width:900px;

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

    font-size:26px;

    font-weight:600;

    margin-top:20px;

    margin-bottom:30px;

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

    padding:15px;

    font-size:14px;

}

td{

    padding:15px;

    text-align:center;

    border-bottom:1px solid #e5e5e5;

    font-size:14px;

    color:#35551f;

}

tr:hover{

    background:#f6f9f2;

}

.empty-message{

    text-align:center;

    padding:20px;

    font-size:15px;

    color:#666;

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

            View Users

        </h2>

        <table>

            <tr>

                <th>ID</th>

                <th>Username</th>

                <th>Password</th>

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

            </tr>

            <?php

                }

            }else{

            ?>

            <tr>

                <td colspan="3" class="empty-message">

                    No users found.

                </td>

            </tr>

            <?php

            }

            ?>

        </table>

    </div>

</div>

</body>

</html>