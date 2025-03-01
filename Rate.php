<html>
    <head>
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c69a1a164e.js" crossorigin="anonymous"></script>
    </head>
    <style>
        body{
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost' , sans-serif;
            background: url(a.jpg);
            background-position: center;
            background-size: cover;
            position: relative;
        }
        .main{
            width: 50%;
            margin: 50px auto;
            overflow: hidden;
            box-shadow: 5px 20px 50px #000;
            backdrop-filter: blur(10px);
            border: 3px solid rgb(135, 131, 131);
            border-radius: 50px;
        }
         h1{
            color: #fff;
                  font-size: 2.3em;

            text-align: center;
            margin-top: 0;
        }
        
        input{
            justify-content: center;
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 0;
        }
        textarea{
            justify-content: center;
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 0;
        }
        button{
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #3046d7;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }
        button:hover{
            background: #3046d7;
        }
        .icon{
            color: blue;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 20px;
        }
    </style>
    <?php
    if(isset($_POST['r'])){
        $uname = $_POST['uname'];
    }
    ?>
    <body>
        <div class="main">
        <div class="d-flex flex-row justify-content-center py-5">
            <div class="d-flex flex-column w-50">
                <form action="Rate.php" method="POST">
                    <h1>Rating And Review For Hospital</h1><br>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">User Name</label>
                        <input type="text" value="<?php echo $uname; ?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Review</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="rev" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <i id="r1" onclick="select('r1')" class="fa-regular fa-star icon"></i>
                        <i id="r2" onclick="select('r2')" class="fa-regular fa-star icon"></i>
                        <i id="r3" onclick="select('r3')" class="fa-regular fa-star icon"></i>
                        <i id="r4" onclick="select('r4')" class="fa-regular fa-star icon"></i>
                        <i id="r5" onclick="select('r5')" class="fa-regular fa-star icon"></i>
                    </div>
                    <div class="d-none">
                        <input type="number" name="rate" id="rate" required>
                        <input type="text" value="<?php echo $uname; ?>" name="uname">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="sub"  value="Submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <script>
            function select(id){
                if(id == 'r1'){
                    document.getElementById('r1').classList.remove("fa-regular");
                    document.getElementById('r1').classList.add("fa-solid");

                    document.getElementById('r2').classList.remove("fa-solid");
                    document.getElementById('r3').classList.remove("fa-solid");
                    document.getElementById('r4').classList.remove("fa-solid");
                    document.getElementById('r5').classList.remove("fa-solid");

                    document.getElementById('r2').classList.add("fa-regular");
                    document.getElementById('r3').classList.add("fa-regular");
                    document.getElementById('r4').classList.add("fa-regular");
                    document.getElementById('r5').classList.add("fa-regular");

                    document.getElementById('rate').value = 1;
                }
                if(id == 'r2'){
                    document.getElementById('r1').classList.remove("fa-regular");
                    document.getElementById('r2').classList.remove("fa-regular");
                    document.getElementById('r1').classList.add("fa-solid");
                    document.getElementById('r2').classList.add("fa-solid");

                    document.getElementById('r3').classList.remove("fa-solid");
                    document.getElementById('r4').classList.remove("fa-solid");
                    document.getElementById('r5').classList.remove("fa-solid");

                    document.getElementById('r3').classList.add("fa-regular");
                    document.getElementById('r4').classList.add("fa-regular");
                    document.getElementById('r5').classList.add("fa-regular");

                    document.getElementById('rate').value = 2;
                }
                if(id == 'r3'){
                    document.getElementById('r1').classList.remove("fa-regular");
                    document.getElementById('r2').classList.remove("fa-regular");
                    document.getElementById('r3').classList.remove("fa-regular");
                    document.getElementById('r1').classList.add("fa-solid");
                    document.getElementById('r2').classList.add("fa-solid");
                    document.getElementById('r3').classList.add("fa-solid");
                    
                    document.getElementById('r4').classList.remove("fa-solid");
                    document.getElementById('r5').classList.remove("fa-solid");
                    
                    document.getElementById('r4').classList.add("fa-regular");
                    document.getElementById('r5').classList.add("fa-regular");
                
                    document.getElementById('rate').value = 3;
                }
                if(id == 'r4'){
                    document.getElementById('r1').classList.remove("fa-regular");
                    document.getElementById('r2').classList.remove("fa-regular");
                    document.getElementById('r3').classList.remove("fa-regular");
                    document.getElementById('r4').classList.remove("fa-regular");
                    
                    document.getElementById('r1').classList.add("fa-solid");
                    document.getElementById('r2').classList.add("fa-solid");
                    document.getElementById('r3').classList.add("fa-solid");
                    document.getElementById('r4').classList.add("fa-solid");
                    
                    document.getElementById('r5').classList.remove("fa-solid");
                    
                    document.getElementById('r5').classList.add("fa-regular");

                    document.getElementById('rate').value = 4;
                }
                if(id == 'r5'){
                    document.getElementById('r1').classList.remove("fa-regular");
                    document.getElementById('r2').classList.remove("fa-regular");
                    document.getElementById('r3').classList.remove("fa-regular");
                    document.getElementById('r4').classList.remove("fa-regular");
                    document.getElementById('r5').classList.remove("fa-regular");
                    
                    document.getElementById('r1').classList.add("fa-solid");
                    document.getElementById('r2').classList.add("fa-solid");
                    document.getElementById('r3').classList.add("fa-solid");
                    document.getElementById('r4').classList.add("fa-solid");
                    document.getElementById('r5').classList.add("fa-solid");

                    document.getElementById('rate').value = 5;
                }
            }
        </script>
        <?php
            if(isset($_POST['sub'])){
                $un = $_POST['uname'];
                $rev = $_POST['rev'];
                $rate = $_POST['rate'];

                $con = mysqli_connect('localhost', 'root', '', 'hospital');
                $q = "INSERT INTO `rate`(`id`, `u_name`, `rate`, `review`) VALUES (NULL,'$un',$rate,'$rev')";

                $result = mysqli_query($con, $q);
                if($result){
                    ?>
                    <script>
                        window.location.href = 'second.php';
                    </script>
                    <?php
                }
            }
        ?>
    </body>
</html>
<!-- <i class="fa-solid fa-star"></i> -->