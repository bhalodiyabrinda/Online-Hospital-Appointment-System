<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<style>
    body{
        background: url(a.jpg);
        background-position: center;
        background-size: cover;
        position: relative;
    }
    .container {
        width: 50%;
        margin: 50px auto;
        box-shadow: 5px 20px 50px #000;
        backdrop-filter: blur(10px);
        border: 3px solid rgb(135, 131, 131);
        border-radius: 10px;
    }
    h1{
        color: #fff;
        text-align: center;
        margin-top: 0;
    }
    form {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;

    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="datetime-local"] {
        width: 95%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 0;
    }
    
    button {
        width: 60%;
        height: 40px;
        padding: 10px 20px;
        background-color: #3046d7;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        transition: .2s ease-in;
        cursor: pointer;
    }
    
    button:hover {
        background-color: #0056b3;
    }
    .error{
        color: red;
    }
    a{
        text-decoration: none;
        color: #fff;
      } 
    select{
        width: 200px;
        height: 40px;
        border-radius: 5px;
        font-size: 15px;
    }  
</style>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        $('#registrationForm').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                gender: {
                    required: true
                },
                bdate: {
                    required: true
                },
                appointment: {
                    required: true,
                    
                }
            },
            messages: {
                name: {
                    required: 'Please enter your name'
                },
                email: {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email address'
                },
                phone: {
                    required: 'Please enter your phone number',
                    minlength: 'Please enter a valid phone number'
                },
                gender: {
                    required: 'Please select your gender'
                },
                bdate: {
                    required: 'Please enter your birthdate'
                },
                password: {
                    required: 'Please enter valid password'
                },
                appointment: {
                    required: 'Please select appointment time'
                }
            },
            submitHandler: function(error, element) {
                if (element.attr('name')== "name"){
                    $('#name_err').html(error);
                }
                if (element.attr('name')== "email"){
                    $('#emaul_err').html(error);
                }
                if (element.attr('name')== "phone"){
                    $('#phone_err').html(error);
                }
                if (element.attr('name')== "gender"){
                    $('#gender_err').html(error);
                }
                if (element.attr('name')== "bdate"){
                    $('#bdate_err').html(error);
                }
                if(element.attr('name')=="password"){
                    $('#password_err').html(error);
                }
                if (element.attr('name')== "appointment"){
                    $('#appointment_err').html(error);
                }
            }
        });
    });
    
</script>
</head>
<body>
<div class="container">
    <form id="registrationForm" action="#" >
        <h1>Make Your Appointment Here!</h1>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <p id="name_err"></p>

        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <p id="email_err"></p>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            <p id="phone_err"></p>

        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <p id="gender_err"></p>
        </div>
        <div class="form-group">
            <label for="bdate">Birthdate:</label>
            <input type="date" id="bdate" name="bdate" required>
            <p id="bdate_err"></p>

        </div>
        <div class="form-group">
            <label for="appointment">Appointment Time:</label>
            <input type="datetime-local" id="appointment" name="appointment" required>
            <p id="appointment_err"></p>

        </div>

        <div class="form-group">
            <lable for="password">Password</lable>
            <input type="password" id="password" required>
            <p id="password_err"></p>
        </div>

        <button type="submit">Submit</button>
    </form>
   
   <?
    if (isset($_POST['reg_btn'])) {
    $fn = $_POST['name'];
    $em = $_POST['email'];
    $ph = $_POST['phone']
    $gn = $_POST['gender'];
    $bd = $_POST['bdate'];
    $app = $_POST['appointment'];

    $q = "insert into registration values('$fn','$em','$ph',$gn,'$bd', '$app')";
    echo $q;
    if (mysqli_query($con, $q)) {
        echo "registration successfull";
    } else {
        echo "error in registartion";
    }
}
?>

</div>
</body>
</html>
