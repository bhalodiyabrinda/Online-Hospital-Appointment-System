<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hospital management website</title>
    <link rel="stylesheet"type="text/css"href="style.css">
    
</head>
<body>
        
        <!-- main -->
        <div class="main">
            
            <div class="cardBox">
                <div class="card">
                    <div>
                        <h1>Patients </h1>

                    <div class="cardname">

                        <?php
                        require 'dbconfig.php';

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

