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

$search = "";

if(isset($_GET["search"])){

    $search = trim($_GET["search"]);

}

if($search != ""){

    $stmt = mysqli_prepare(

        $conn,

        "SELECT * FROM users WHERE username LIKE ?"

    );

    $keyword = "%" . $search . "%";

    mysqli_stmt_bind_param(

        $stmt,

        "s",

        $keyword

    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

}else{

    $result = mysqli_query(

        $conn,

        "SELECT * FROM users"

    );

}

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

    width:95%;

    max-width:1100px;

    padding:30px;

}

.page-title{

    text-align:center;

    color:#245000;

    font-size:24px;

    font-weight:600;

    margin-top:15px;

    margin-bottom:25px;

}

.search-form{

    display:flex;

    justify-content:center;

    gap:10px;

    margin-bottom:25px;

    flex-wrap:wrap;

}

.search-input{

    width:240px;

    padding:10px 15px;

    border:1px solid #d8d8d8;

    border-radius:25px;

    font-size:13px;

    outline:none;

    font-family:'Poppins',sans-serif;

}

.search-btn{

    padding:10px 22px;

    border:none;

    border-radius:25px;

    background:#245000;

    color:white;

    cursor:pointer;

    font-size:13px;

    font-family:'Poppins',sans-serif;

}

.search-btn:hover{

    background:#336600;

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

    padding:14px;

    font-size:13px;

}

td{

    padding:14px;

    text-align:center;

    border-bottom:1px solid #e5e5e5;

    font-size:13px;

    color:#35551f;

}

tr:hover{

    background:#f6f9f2;

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

<h2 class="page-title">

    View Users

</h2>

<form class="search-form" method="GET">

    <input

        class="search-input"

        type="text"

        name="search"

        placeholder="Search by username"

        value="<?php echo htmlspecialchars($search); ?>"

    >

    <button

        class="search-btn"

        type="submit"

    >

        Search

    </button>

</form>

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

<?php echo $row["id"]; ?>

</td>

<td>

<?php echo htmlspecialchars($row["username"]); ?>

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

<?php

if(isset($stmt)){

    mysqli_stmt_close($stmt);

}

mysqli_close($conn);

?>