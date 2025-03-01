<?php include_once('nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 1.25rem;
}

.btn {
    display: inline-block;
    padding: 0.5rem 1rem;
    margin-right: 10px;
    margin-bottom: 10px;
    font-size: 0.875rem;
    font-weight: 500;
    line-height: 1.5;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    border-radius: 0.25rem;
    transition: all 0.3s ease;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    color: #fff;
    background-color: #0056b3;
    border-color: #0056b3;
}

    </style>
</head>
<body>
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card border-0 bg-light rounded shadow">
                            <div class="card-body p-4">
                                <h1>Admin User</h1>
                                
                                <div class="mt-3">
                                    <a href="add_user.php" class="btn btn-primary">Add User
                                        
                                    </a>
                                    <a href="delete_user.php" class="btn btn-primary">Check User</a>
                                </div>
                            </div>
                        </div>
                    </div>
</body>
</html>