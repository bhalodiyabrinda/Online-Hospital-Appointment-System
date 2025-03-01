<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .form-container {
        background-color: rgb(220, 234, 234);
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 50px;
    }
    body {
    background-image: url('assets/form1.jpg');
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color:#464646;
    }
@media only screen and (max-width: 767px) {
  body {
    background-image: url('assets/form1.jpg');
  } 
	}

</style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <p class="h1" style="font-family:'Poppins', sans-serif; color: #64748b;">Book Your Appointment Here!!!</p>
        <form id="reservationForm">
            <div class="form-group">
                <label for="arrivalDate">Appoinment Date:</label>
                <input type="date" class="form-control" id="arrivalDate" name="arrivalDate" required>
            </div>
            <div class="form-group">
                <label for="departureDate">Departure Date:</label>
                <input type="date" class="form-control" id="departureDate" name="departureDate" required>
            </div>
            <div class="form-group">
                <label for="guests">Number of Patient:</label>
                <input type="number" class="form-control" id="guests" name="guests" required>
            </div>
            <div class="form-group">
                <label for="event">Symptoms:</label>
                <input type="text" name="event" id="event" required class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#reservationForm').submit(function(e) {
            e.preventDefault();
        });
    });
</script>

</body>
</html>
