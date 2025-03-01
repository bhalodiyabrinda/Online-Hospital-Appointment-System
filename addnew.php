<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
    <button><a href="index.php">Back</a></button>
    <button><a href="new.php">add new</a></button>

  <h2 class="text-center"> Doctor Records</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Specilist</th>
        <th>Status</th>
        <th><center>Button</center></th>

      </tr>
    </thead>
    <tbody>
        <?php 
            $con=mysqli_connect("localhost","root","","hospital");
            $q="select * from doctors";
            $result=mysqli_query($con,$q);
            while ($r = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $r[0];?></td>
                    <td>
                        <img height=100px src="photo/<?php echo $r[1];?>" alt="" class="">
                    </td>
                    <td><?php echo $r[2];?></td>
                    <td><?php echo $r[3];?></td>
                    <td><?php echo $r[4];?></td>
                    <td> 
                        <div class="row">
                            <div class="col"><a href="update.php?event_id=<?php echo $r[0]; ?>" class="btn btn-outline-success">Update</a></div>
                            <div class="col"><a href="delete1.php?event_id=<?php echo $r[0];?>" class="btn btn-outline-danger">Delete</a></div>

                        </div>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
  </table>
</div>
</body>
</html>