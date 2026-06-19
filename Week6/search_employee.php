<?php

session_start();

if(!isset($_SESSION['employee_id'])){

    header("Location: employee_login.php");
    exit();

}

include("employee_db_connection.php");

$search = "";

if(isset($_GET['search'])){

    $search = trim($_GET['search']);

    $stmt = $conn->prepare(

        "SELECT * FROM employees
         WHERE fullname LIKE ?
         OR username LIKE ?
         OR department LIKE ?
         ORDER BY id DESC"

    );

    $keyword = "%".$search."%";

    $stmt->bind_param(

        "sss",

        $keyword,
        $keyword,
        $keyword

    );

    $stmt->execute();

    $result = $stmt->get_result();

}

else{

    $result = mysqli_query(

        $conn,

        "SELECT * FROM employees ORDER BY id DESC"

    );

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Search Employees</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{

    margin:0;
    padding:30px;

    font-family:'Poppins',sans-serif;

    background:#eef1e8;

}

.container{

    width:95%;
    max-width:1200px;

    margin:auto;

    background:#b8d98a;

    padding:35px;

    border-radius:35px;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

}

h1{

    text-align:center;

    color:#245000;

    margin-bottom:10px;

}

.subtitle{

    text-align:center;

    color:#35551f;

    margin-bottom:30px;

}

.search-box{

    display:flex;

    gap:10px;

    justify-content:center;

    flex-wrap:wrap;

    margin-bottom:30px;

}

.search-box input{

    width:350px;
    max-width:100%;

    padding:14px;

    border:none;

    border-radius:30px;

    outline:none;

    font-family:'Poppins',sans-serif;

    font-size:13px;

}

.search-box button{

    padding:14px 24px;

    border:none;

    border-radius:30px;

    background:#245000;

    color:white;

    font-size:14px;

    cursor:pointer;

}

.search-box button:hover{

    background:#336600;

}

.top-buttons{

    display:flex;

    justify-content:space-between;

    flex-wrap:wrap;

    gap:10px;

    margin-bottom:25px;

}

.top-buttons a{

    text-decoration:none;

    background:#245000;

    color:white;

    padding:12px 22px;

    border-radius:25px;

}

.top-buttons a:hover{

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

    padding:15px;

}

td{

    padding:15px;

    text-align:center;

    border-bottom:1px solid #dddddd;

}

tr:hover{

    background:#f6f6f6;

}

@media(max-width:900px){

table{

display:block;

overflow-x:auto;

}

}

</style>

</head>

<body>

<div class="container">

<h1>Search Employees</h1>

<p class="subtitle">

Search employees by Full Name, Username or Department.

</p>

<div class="top-buttons">

<a href="employee_dashboard.php">

← Dashboard

</a>

<a href="view_employees.php">

View Employees

</a>

</div>

<form method="GET">

<div class="search-box">

<input

type="text"

name="search"

placeholder="Search employee..."

value="<?php echo htmlspecialchars($search); ?>">

<button type="submit">

Search

</button>

</div>

</form>

<table>

<tr>

<th>ID</th>

<th>Full Name</th>

<th>Email</th>

<th>Department</th>

<th>Username</th>

</tr>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['fullname']); ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>

<td><?php echo htmlspecialchars($row['department']); ?></td>

<td><?php echo htmlspecialchars($row['username']); ?></td>

</tr>

<?php

}

}

else{

?>

<tr>

<td colspan="5">

No employee found.

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>