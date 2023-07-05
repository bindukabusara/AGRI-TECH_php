<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE FOR ORDER PAGE</title>

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


    <script>
        function logout() {
            if (confirm('Are you sure you want to log out?')) {
                // User clicked "Yes," redirect to the home page
                window.location.href = 'home.php';
            } else {
                // User clicked "No," do nothing, stay on the same page
            }
        }
    </script>


</head>

<body>

    <nav class="navlist">
        <div class="sub">
            <ul>
                <li>
                    <img src="logoa.png" alt="logo" width="100px" length="100px">
                </li>
                <li><a href="farmer.php">Farmer</a></li>
                <li><a href="">Service</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="history.php">History</a></li>
                <li><a href="admin.html">Admin</a></li>
                <li><a href=" javascript:void(0);" onclick="logout()">Log out</a></li>
            </ul>
        </div>
    </nav><BR><br><br><br><br><br><br>
    <center>
        <h2>WHOLE SELLER DATABASE TRACKING (admin view)</h2>
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
                    <th>TOTAL COST PER KG (SHS)</th>
                    <th colspan="2">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php'; // Include the database connection file

                // Fetch data from the `order` table
                $sql = "SELECT * FROM `order`"; // Enclose table name in backticks
                $result = $connection->query($sql);

                // Check if there are any rows returned
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Retrieve data for each row
                        $ID = $row['ID'];
                        $name = $row['name'];
                        $product = $row['product'];
                        $quantity = $row['quantity'];
                        $totalCost = $row['totalCost'];
                        $contact = $row['contact'];

                        // Display the data in the table
                        echo "<tr>
            <td>$ID</td>
            <td>$name</td>
            <td>$product</td>
            <td>$quantity</td>
            <td>$totalCost</td>
            <td>$contact</td>
          </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data found</td></tr>";
                }

                $connection->close();
                ?>


            </tbody>
        </table>
    </center>
</body>


</html>
