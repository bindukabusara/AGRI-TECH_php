<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>

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
    </style>

</head>

<body>
    <nav class="navlist">
        <div class="sub">
            <ul>
                <li>
                    <h1>Agri<span>Trans</span></h1>
                </li>
                <li><a href="home.php"><b>Home</b></a></li>
                <li><a href="">Service</a></li>
                <li><a href="">About Us</a></li>
            </ul>
        </div>
    </nav><BR><br>

    <h1></h1>
    <P> A center of excellence in the heart of Africa</P> <br>
    <center>
        <h2>DATABASE INFORMATION</h2>
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
                    <th colspan="2">COST PER KG (SHS)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php'; // Include the database connection file

                // Fetch data from the farmer table
                $sql = "SELECT * FROM farmer";
                $result = $connection->query($sql);

                // Check if there are any rows returned
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Retrieve data for each row
                        $ID = $row['ID'];
                        $name = $row['name'];
                        $product = $row['product'];
                        $quantity = $row['quantity'];
                        $cost = $row['cost'];

                        // Display the data in the table
                        echo "<tr>
                <td>$ID</td>
                <td>$name</td>
                <td>$product</td>
                <td>$quantity</td>
                <td>$cost</td>
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
