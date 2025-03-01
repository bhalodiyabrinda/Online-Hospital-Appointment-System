<?php include_once('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding-top 50px;
        }

        #sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 250px;
            background-color: #333;
            color: #fff;
            padding-top: 30px;
            margin-top: 60px;
        }

        #sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 20px 30px;
            border-bottom: 1px solid #555;
        }

        #sidebar a:hover {
            background-color: #555;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
        }

        h1 {
            margin-top: 0;
        }
    </style>
</head>
<body>

<div id="sidebar">
    <a href="dashboard.php">Dashboard</a>
    <a href="appointment.php">Appointment</a>
    <a href="user.php">User</a>
    <a href="setting.php">Settings</a>
    <a href="policy.php">Policy</a>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a href=""></a>
    <a href="index.php"><h2>LOGOUT</h2></a>
</div>

<div id="content">
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard. You can navigate using the sidebar links.</p>
</div>

    <div class="main">
            
            <div class="cardBox">
                <div class="card">
                    <div>
                        <h1>Patients </h1>

                    <div class="cardname">

                        <?php
                        require 'database.php';

                        $query = "SELECT id FROM crud ORDER BY id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1>'.$row.'</h1>';
                        ?>
                    </div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>

                    </div>
                </div>
                
                    <div class="card">
                    <div>
                        <h1>Doctors</h1>

                    <div class="cardname">

                        <?php
                        require 'dtconfig.php';

                        $query = "SELECT id FROM doctors ORDER BY id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1>'.$row.'</h1>';
                        ?>
                    </div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>

                    </div>
                </div>

                <div class="card">
                    <div>
                        <h1>Departments</h1>

                    <div class="cardname">

                        <?php
                        require 'dpconfig.php';

                        $query = "SELECT id FROM dbname ORDER BY id";
                        $query_run = mysqli_query($connection,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1>'.$row.'</h1>';
                        ?>
                    </div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>

                    </div>
                </div>
                
            
        <div class="card">
            <div>
                <h1>Policy</h1>
            <div class="numbers">30</div>
            <div class="cardname"></div>
            </div>
            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
        </div>
        </div>
        </div>
        
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        let toggle=document.querySelector('.toggle');
        let navigator=document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){

            navigator.classList.toggle('active');
            main.classList.toggle('active');

        }
            
        let list = document.querySelectorAll('.navigation li');
        function activelink(){
            list.forEach((item)=>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item)=>
        item.addEventListener('mouseover',activeLink));
    </script>


</body>
</html>