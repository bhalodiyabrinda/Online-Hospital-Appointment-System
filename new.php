<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php
    //$event_id = $_REQUEST['event_id'];
    // $_SESSION['event_id'] = $event_id;
    $con=mysqli_connect("localhost","root","","hospital");
    $q="select * from doctors ";
    $result=mysqli_query($con,$q);
    $r=mysqli_fetch_array($result);
    
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container my-5">
<form method="POST" enctype="multipart/form-data" action="new_action.php">
  
  <div class="form-group">
    <label><strong>Name:</strong></label>
    <input type="text"  class="form-control"placeholder="Enter Your Name"name="name" autocomplete="off">
</div>
<br>
<div class="form-group">
    <label><strong>Photo:</strong></label>
    <br>
    <img height=100px src="photo/" alt="">
    <input type="file" name="photo" id="">
</div>
<br>
<div class="form-group">
    <label><strong>Specialist:</strong></label>
    <input type="text" " class="form-control"placeholder="Enter the doctor's speciality"name="sp" autocomplete="off">
</div>
<br>

<div class="form-group">
    <label><strong>Status:</strong></label>
    <br>
    <input type="radio" name="status" value="Active" id="">Active
    <input type="radio" name="status" value="Inactive" id="">Inactive
</div>
<br>

<button name="btn" type="submit" class="btn btn-primary" >Save changes</button>
</form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>pop-up</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  add doctors
</button>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>