<?php
include 'connection.php'; // Include the database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name']; // New line: Get the name from the form

    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $totalCost = $_POST['totalCost'];
    $contact = $_POST['contact'];

    // Create the SQL INSERT query
    $sql = "INSERT INTO order (name, product, quantity, totalCost, contact) VALUES ('$name', '$product', '$quantity', '$totalCost','$contact')"; // New line: Include the name in the query

    if ($connection->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $connection->error;
    }
    exit; // Terminate the script execution after handling the data insertion
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ORDER page </title>

    <!-- CSS -->
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="Uganda Christian University.css">

    <!-- Boxicons css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


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
                margin-bottom: 2px;
            }

            .container.forms {
                width: 10%;
                max-width: 200px;
                margin: 0 auto;
                background-color: #fff;
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

    </nav>


    <section class="container forms">
        <h1>Agri<span>Trans</span></h1>
        <div class="form login">
            <div class="form-content">

                <h2>Order</h2><br>
                <p id="greetingMessage"></p><br>

                <form id="requestForm" action="info2.html" onsubmit="constructURL(event)">


                    <div class="field input-field">
                        <label for="product">Product<span class="required"></span></label>
                        <select class="selectProduct" id="product" name="product" required>
                            <option value="">-- Please select a product --</option>

                            <option value="beans">Beans</option>
                            <option value="rice">Rice</option>
                            <option value="wheat">Wheat</option>
                            <option value="maize">Maize</option>
                            <option value="peas">Peas</option>

                        </select>

                    </div>
                    <div class="field input-field">
                        <label for="quantity">Quantity (KG)<span class="required"></span></label>
                        <input type="number" placeholder="50-200" class="input" min="50" max="200" value="50" required id="quantity" name="quantity">
                    </div>
                    <div class="field input-field">
                        <label>Total Cost (SHS)</label>
                        <input type="number" placeholder="" class="input" id="totalCost" name="totalCost" readonly>
                    </div><br><br><br>



                    <div class="field button-field">
                        <button><strong>Complete Order</strong></button>
                    </div><br>


                </form>
            </div>
        </div>
    </section>

    <!-- Javascript -->

    <!-- JavaScript -->




</body>

</html>
