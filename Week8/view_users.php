<?php

session_start();

if(
    !isset($_SESSION["user"]) ||
    !isset($_SESSION["role"])
){

    header("Location: login.php");

    exit();

}

if(
    $_SESSION["role"] != "superadmin" &&
    $_SESSION["role"] != "manager"
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

$search = "";

if(isset($_GET["search"])){

    $search = trim($_GET["search"]);

}

if($search != ""){

    $stmt = mysqli_prepare(

        $conn,

        "SELECT id, fullname, username, role
         FROM users
         WHERE username LIKE ?
         OR fullname LIKE ?"

    );

    $keyword = "%" . $search . "%";

    mysqli_stmt_bind_param(

        $stmt,

        "ss",

        $keyword,

        $keyword

    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

}else{

    $result = mysqli_query(

        $conn,

        "SELECT id, fullname, username, role
         FROM users
         ORDER BY id ASC"

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

    max-width:1200px;

    margin:auto;

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

    width:260px;

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

    transition:.3s;

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

    display:block;

    overflow-x:auto;

    white-space:nowrap;

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

.role-badge{

    display:inline-block;

    padding:5px 12px;

    border-radius:15px;

    color:white;

    font-size:12px;

    font-weight:600;

}

.superadmin{

    background:#c0392b;

}

.manager{

    background:#f39c12;

}

.voter{

    background:#27ae60;

}

/* ===============================
   Responsive Design
================================*/

@media (max-width:1024px){

.search-form{

    justify-content:center;

}

}

@media (max-width:768px){

.container{

    width:100%;

    padding:20px;

}

.page-title{

    font-size:22px;

}

.search-form{

    flex-direction:column;

    align-items:center;

}

.search-input{

    width:100%;

    max-width:350px;

}

.search-btn{

    width:100%;

    max-width:350px;

}

th,
td{

    padding:10px;

    font-size:12px;

}

}

@media (max-width:480px){

.container{

    padding:15px;

}

.page-title{

    font-size:20px;

}

.search-input,
.search-btn{

    max-width:100%;

}

.role-badge{

    font-size:11px;

    padding:4px 10px;

}

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

                placeholder="Search by name or username"

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

                <th>Full Name</th>

                <th>Username</th>

                <th>Role</th>

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

                    <?php echo htmlspecialchars($row["fullname"]); ?>

                </td>

                <td>

                    <?php echo htmlspecialchars($row["username"]); ?>

                </td>

                <td>

                    <span class="role-badge <?php echo $row["role"]; ?>">

                        <?php echo ucfirst($row["role"]); ?>

                    </span>

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

</body>

</html>

<?php

if(isset($stmt)){

    mysqli_stmt_close($stmt);

}

mysqli_close($conn);

?>