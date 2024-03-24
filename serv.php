<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <style>
         {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

         td {
            text-align: center;
        }

     td,  th {
            border: 1px solid #E3A6DD;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #EBB7F9;
        }

         tr:hover {
            background-color: #ddd;
        }

         th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #B346C7;
            color: white;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="container">
             <nav class="navbar navbar-expand-lg navbar-light bg-light nav-fill">
        <a class="navbar-brand" href="index.html"><img src="images/57.png" alt="logo" width="160" height="70" class="d-block mx-auto rounded"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="adlogin.php">Admin</a>
                <a class="dropdown-item" href="log.php">Customer</a>
               
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="gal 1.html">Ladies</a>
                <a class="dropdown-item" href="gal 2.html">weddings</a>
                <a class="dropdown-item" href="gal 3.html">Mens</a>
                <a class="dropdown-item" href="gal 4.html">kids</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="serv.php">Other Adds</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="comment.php">Comments</a>
            </li>
            <li>
              <a class="nav-link" href="galon.html">
                <button>Give Your Sandal Details</button>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    <h1 >Other Companies</h1>
    
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shoedb";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Display existing service providers in a table
    $sql = "SELECT company_name, services, service_page_link, about_company, created_at FROM service_providers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table >";
        echo "<tr><th>Company Name</th><th>Services</th><th>Service Page Link</th><th>About Company</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["company_name"]. "</td><td>" . $row["services"]. "</td><td><a href='" . $row["service_page_link"] . "' target='_blank'>" . $row["service_page_link"] . "</a></td><td>" . $row["about_company"]. "</td><td>" . $row["created_at"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No service providers yet.</p>";
    }

    // Close database connection
    $conn->close();
    ?>
 </div> </div>
</body>
</html>
