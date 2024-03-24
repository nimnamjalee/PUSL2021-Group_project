<!DOCTYPE html>
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
        #website {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #website td {
            text-align: center;
        }

        #website td, #contact th {
            border: 1px solid #E3A6DD;
            padding: 8px;
        }

        #website tr:nth-child(even) {
            background-color: #EBB7F9;
        }

        #website tr:hover {
            background-color: #ddd;
        }

        #website th {
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
        <h2>Website Order</h2>
        <table id="website">
            <thead>
            <tr>
             <th>Name</th>
                <th>Category</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Shoe Size(width)</th>
                <th>Shoe Size(height)</th>
                <th>Material Color</th>
                <th>Costume</th>
                <th>Heel</th>
                <th>Hyperlink</th>
                <th>Detail</th>
                <th>Required Date</th>
                <th>Order Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "shoedb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            if (isset($_GET['delete_id'])) {
                $delete_id = $_GET['delete_id'];
                $sql = "DELETE FROM phy WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $delete_id);
                if ($stmt->execute()) {
                    echo "order deleted successfully.";
                } else {
                    echo "Error deleting contact: " . $conn->error;
                }
            }

           
            $sql = "SELECT id,name, category, address, pn, email, size, s1, materialColor, costume, heel, hyperlink, detail, requiredDate, orderPrice FROM phy";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                               while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['pn'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['size'] . "</td>";
                    echo "<td>" . $row['s1'] . "</td>";
                    echo "<td>" . $row['materialColor'] . "</td>";
                    echo "<td>" . $row['costume'] . "</td>";
                    echo "<td>" . $row['heel'] . "</td>";
                    echo "<td>" . $row['hyperlink'] . "</td>";
                    echo "<td>" . $row['detail'] . "</td>";
                    echo "<td>" . $row['requiredDate'] . "</td>";
                   
                    echo "<td>" . $row['orderPrice'] . "</td>";
                    
                    echo "<td><a href='?delete_id=" . $row['id'] . "'>Accept</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No orders found.</td></tr>";
            }

            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
