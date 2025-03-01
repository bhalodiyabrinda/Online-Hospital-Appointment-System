<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Navbar</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            paddding-bottom:500px;
        }
        .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
}

.navbar-left h1 {
    margin: 0;
}

.admin-info {
    display: flex;
    align-items: center;
}

.admin-info img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}   
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <h1>Administration</h1>
        </div>
        <div class="navbar-right">
            <div class="admin-info">
            <a href="dashboard.php"><button>Home</button></a>
            </div>
        </div>
    </nav>
</body>
</html>