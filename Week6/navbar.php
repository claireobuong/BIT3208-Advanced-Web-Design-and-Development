<div class="navbar">

    <div class="nav-logo">

        CiviVote Kenya

    </div>

    <div class="nav-links">

        <a href="dashboard.php">Dashboard</a>

        <a href="add_user.php">Add User</a>

        <a href="view_users.php">View Users</a>

        <a href="edit_user.php">Edit User</a>

        <a href="delete_user.php">Delete User</a>

        <a class="logout-btn" href="logout.php?test=1">Logout</a>

    </div>

</div>

<style>

.navbar{

    background:#245000;

    color:white;

    padding:15px 25px;

    margin-bottom:25px;

    border-radius:20px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    flex-wrap:nowrap;

    gap:20px;

}

.nav-logo{

    font-size:18px;

    font-weight:600;

    white-space:nowrap;

}

.nav-links{

    display:flex;

    align-items:center;

    gap:16px;

    flex-wrap:nowrap;

}

.nav-links a{

    color:white;

    text-decoration:none;

    font-size:14px;

    padding:8px 12px;

    border-radius:8px;

    transition:.3s;

    white-space:nowrap;

}

.nav-links a:hover{

    background:rgba(255,255,255,.15);

}

.logout-btn{

    background:#c0392b;

}

.logout-btn:hover{

    background:#a93226 !important;

}

</style>