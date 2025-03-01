<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--*******import poppin fonts********-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<body>
    <section class="navbar">
        <nav class="navigation">
          <!--**menu-btn**-->
          <input type="checkbox" class="menu-btn" id="menu-btn">
          <label for="menu-btn" class="menu-icon">
              <span class="nav-icon"></span>
          </label>
    
          <a href="#" class="logo"><img src="photo/Logo.png" width="200px" style="margin-right: 800px;"></a>
    
    
          <a href="second.php" class="nav-appointment-btn">Home</a>
      </nav>
    
      </section>
    <div class="container-fluid">
        <center><div class="h1">
            BILL DETAILS
        </div></center>
        <div class="row">
            <!-- First Card-->
            <!-- ============================================================-->
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card border-0 bg-light rounded shadow">
                    <div class="card-body p-4">
                        <h5>Payment Status: Pending</h5>
                        <div class="mt-3">
                            <p>Medical <br>
                            $991</p>
                        </div>
                        <div class="mt-3">
                            <a href="unpaid.php"><button class="btn btn-primary" id="viewDetailsButton">View Details</button></a>
                        </div>
                        <!-- View Details button -->

                        <div class="modal fade" id="activerooms" tabindex="-1" aria-labelledby="popupTableLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="popupTableLabel" role="">Data Table</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Room Number</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2024-02-01</td>
                                            <td>John Doe</td>
                                            <td>A101</td>
                                            <td><a href="Details.html" class="btn btn-primary" type="button">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>2024-02-02</td>
                                            <td>Jane Smith</td>
                                            <td>B107</td>
                                            <td><a href="Details.html" class="btn btn-primary" type="button">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card border-0 bg-light rounded shadow">
                    <div class="card-body p-4">
                        <h5>Payment Status: Paid</h5>
                        <div class="mt-3">
                        <p>Room
                            <br>
                            $700
                        </p>    
                        </div>
                        
                        <div class="mt-3">
                            <a href="paid.php" class="btn btn-primary" onclick="">View Recipt</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            </div>
            </div>
            
    </div>

    
</body>
</html>