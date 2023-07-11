<?php
session_start(); // Start the session

include 'connection.php'; // Include the database connection file

// Retrieve the contact from the URL parameter
$contact = $_GET['contact'];

// Prepare and execute the query to fetch data based on the contact
$stmt = $connection->prepare("SELECT * FROM farmer WHERE contact = ?");
$stmt->bind_param("s", $contact);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE FOR FARMER PAGE</title>

    <!-- CSS -->
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="home2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">


    <style>
        /* Responsive styles */
        /* Small screens */
        @media screen and (max-width: 576px) {
            .navlist ul {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .navlist ul li {
                margin-bottom: 10px;
            }

            .container {
                padding: 20px;
            }

            .field.button-field {
                text-align: center;
            }

            .field input,
            .field button {
                height: 80%;
                width: 30%;
                border: rgb(0, 0, 0);
                font-size: 20px;
                font-weight: 500px;
                border-radius: 10px;
            }

            a {
                text-decoration: none;
            }
        }

        /* Medium screens */
        @media screen and (min-width: 577px) and (max-width: 992px) {
            .navlist ul {
                justify-content: center;
            }
        }

        /* Large screens */
        @media screen and (min-width: 993px) {
            .navlist ul {
                justify-content: flex-end;
            }
        }


        /* ... Your existing CSS code ... */

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e6e6e6;
        }
    </style>
    </style>

</head>

<body>
    <script>
        function logout() {
            if (confirm('Are you sure you want to log out?')) {
                // User clicked "Yes," redirect to the home page with name and contact as URL parameters
                window.location.href = 'home.php?name=<?php echo $name; ?>&contact=<?php echo $contact; ?>';
            } else {
                // User clicked "No," do nothing, stay on the same page
            }
        }
    </script>
    <nav class="navlist">
        <div class="sub">
            <ul>
                <li>
                    <img src="logoa.png" alt="logo" width="100px" length="100px">
                </li>
                <li><a href="farmer.php">Farmer</a></li>
                <li><a href="history.php"><b><u>History</u></b></a></li>
                <li><a href="adminlog.php">Admin</a></li>
                <li><a href=" javascript:void(0);" onclick="logout()">Log out</a></li>
            </ul>
        </div>
    </nav><BR><br>


    <br><br><br><br><br><br>
    <center>
        <h2>FARMER DATABASE TRACKING (admin view)</h2>
    </center>
    </div><BR>
    <center>
        <table border="2">
            <thead>
                <tr>
                    <th rowspan="2">ID</th>
                    <th>Name</th>
                    <th>PRODUCT</th>
                    <th>QUANTITY (KG)</th>
                    <th>COST PER KG (SHS)</th>
                    <th colspan="2">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any rows returned
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Retrieve data for each row
                        $ID = $row['ID'];
                        $name = $row['name'];
                        $product = $row['product'];
                        $quantity = $row['quantity'];
                        $cost = $row['cost'];
                        $contact = $row['contact'];

                        // Display the data in the table
                        echo "<tr>
                <td>$ID</td>
                <td>$name</td>
                <td>$product</td>
                <td>$quantity</td>
                <td>$cost</td>
                <td>$contact</td>
              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }

                $stmt->close();
                $connection->close();
                ?>


            </tbody>
        </table>
    </center>
</body>


</html>
