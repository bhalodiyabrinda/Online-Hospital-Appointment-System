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
            overflow: hidden;
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
            border-radius: 5px
        }
    
        .form-group {
            margin-bottom: 20px;
        }
    
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 20px;
        }
    
        input{
            justify-content: center;
            margin-left: 20px;
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 0;
        }
        select{
            justify-content: center;
            margin-left: 20px;

            width: 93%;
            height: 40px;
            border-radius: 5px;
            font-size: 15px;
        }  
        button {
            width: 60%;
            height: 40px;
            background-color: #3046d7;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: .2s ease-in;
            cursor: pointer;
            justify-content: center;

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
                    weight: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    date: {
                        required: true
                    },
                    time: {
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
                    weight: {
                        required: 'Please enter your weight'
                    },
                    city: {
                        required: 'Please enter your city'
                    },
                    date: {
                        required: 'Please select appointment date'
                    },
                    time: {
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
                    if (element.attr('name')== "weight"){
                        $('#weight_err').html(error);
                    }
                    if (element.attr('name')== "city"){
                        $('#citye_err').html(error);
                    }
                    if (element.attr('name')== "date"){
                        $('#date_err').html(error);
                    }
                    if (element.attr('name')== "time"){
                        $('#time_err').html(error);
                    }
                }
            });
        });
    </script>
    </head>
    <body>
    <div class="container">
        <form id="registrationForm" action="registrationForm.php" >
            <h1>Appointment Form</h1>

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
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight" required>
                <p id="weight_err"></p>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>
                <p id="city_err"></p>
            </div>
            <div class="form-group">
                <label for="date">Appointment Date:</label>
                <input type="date" id="date" name="date" required>
                <p id="date_err"></p>
            </div>
            <div class="form-group">
                <label for="time">Appointment Time:</label>
                <input type="time" id="time" name="time" required>
                <p id="time_err"></p>
            </div>
            <button name="submit" type="submit"><a href="index.html">Submit</a></button>
        </form>
    </div>
</body>
</html>

