<?php
include_once("guestheader.php");

?>

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
    .container{
      width: 450px;
      height: 550px;
      overflow: hidden;
      border-radius: 40px;
      backdrop-filter: blur(10px);
      border: 3px solid rgb(135, 131, 131);
      box-shadow: 5px 20px 50px #000;
    }
    .new{
      position: relative;
      width: 100%;
      height: 100%;
    }
    h2{
      color: #fff;
      font-size: 2.3em;
      justify-content: center;
      display: flex;
      margin: 50px;
      font-weight: bold;
      cursor: pointer;
      transition: .5s ease-in-out;
    }
    input{
      width: 60%;
      height: 40px;
      background: #fff;
      justify-content: center;
      display: flex;
      margin: 30px auto;
      padding: 10px;
      border: none;
      outline: none;
      border-radius: 5px;
    }
    button{
      width: 60%;
      height: 40px;
      margin: 10px auto;
      justify-content: center;
      display: block;
      color: #fff ;
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
      
</style>
<br>
    <div class="new">
        
            <form action="update_new_password.php" method="post" enctype="multipart/form-data" id="form1">
            <h2>Reset Password Form</h2>

                <div class="form-group">
                    <label for="pwd"></label>
                    <input type="password" class="form-control" id="pwd" placeholder="New Password" name="pswd">
                    <span id="pswd_err"></span>
                </div>
                <div class="form-group">
                    <label for="repwd"></label>
                    <input type="password" class="form-control" id="repwd" placeholder="Confirm New Password" name="repswd">
                    <span id="repswd_err"></span>
                </div>

                <button type="submit" class="btn" value="Submit" name="btn">Submit</button>
            </form>
        </div>
    </div>

<br>