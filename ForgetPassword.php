<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?famil=Jost:wgth@500&display=swap">
  <title>Forget Password</title>
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
      width: 400px;
      height: 500px;
      overflow: hidden;
      border-radius: 40px;
      backdrop-filter: blur(10px);
      border: 3px solid rgb(135, 131, 131);
      box-shadow: 5px 20px 50px #000;
    }
    label{
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
      height: 20px;
      background: #fff;
      justify-content: center;
      display: flex;
      margin: 20px auto;
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
    a{
      text-decoration: none;
      color: #fff;
    }  
    .error{
      color: red;
      font-size: 15px;
      margin-top: 0;
      margin-bottom: 0;
    }
  </style>
  <script src="jquery-3.7.1.min.js"></script>
  <script src="jquery.validate.js"></script>
  <script>
    $(document).ready(function () {
        
        $.validator.addMethod("emregex", function(value, element){
            regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(value);
        },"Email adress is not formatted");
        
        $('#form1').validate({
            rules: {
                
                em:{
                    required:true,
                    emregex:true
                }
            },
            messages:{
                
                em:{
                    required: "Email is required field"
                }
            },
            errorPlacement: function(error, element){
                
                if (element.attr('name')== "em"){
                    $('#em_err').html(error);
                }
                
            }
        })
    });

</script>
</head>
<body>
<div class="main">
    <form id="form1" method="POST" action="forgot_password_action.php">
      <label for="">Forget Password?</label>
      <input type="email" name="email" id="em1" placeholder="Email">
      <p id="em_err"></p>
      <button name="btn">Send OTP</button>
    </form>
  </div>

</body>
</html>