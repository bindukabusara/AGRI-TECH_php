<?php
session_start(); //start the session_start

include 'connection.php'; // Include the database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data

    $lname = $_POST['lname'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['cost'];

    // Retrieve the name and contact from the session variables
    $name = $_SESSION['name'];
    $contact = $_SESSION['contact'];

    // Create the SQL INSERT query
    $sql = "INSERT INTO farmer (name, lname, product, quantity, cost, contact) VALUES ('$name','$lname', '$product', '$quantity', '$cost','$contact')"; // New line: Include the name in the query

    if ($connection->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $connection->error;
    }

    // Update the session variables with the new VALUES
    $_SESSION['name'] = $name;
    $_SESSION['contact'] = $contact;

    exit; // Terminate the script execution after handling the data insertion
}
// Get the name and contact from the URL parameters
$name = $_GET['name'];
$contact = $_GET['contact'];

// store the name and contact in the session variables
$_SESSION['name'] = $name;
$_SESSION['contact'] = $contact;


$connection->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FARMER PAGE</title>

    <!-- CSS -->
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="Uganda Christian University.css">


    <style>
        /* Common styles for all screen sizes */
        /* (Add your existing styles here) */

        /* Responsive styles */
        /* Small screens */
        @media screen and (max-width: 576px) {
            .division {
                flex-direction: column;
                align-items: center;
            }

            .form.login {
                width: 90%;
                max-width: 300px;
                margin-bottom: 10px;
            }

            .form.login .form-content {
                margin-bottom: 10px;
            }

            .navlist ul {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .navlist ul li {
                margin-bottom: 10px;
            }

            /* (Add more responsive styles as needed) */
        }

        /* Medium screens */
        @media screen and (min-width: 577px) and (max-width: 992px) {
            .division {
                flex-direction: column;
                align-items: center;
            }

            .form.login {
                width: 80%;
                max-width: 400px;
                margin-bottom: 10px;
            }

            .form.login .form-content {
                margin-bottom: 10px;
            }

            /* (Add more responsive styles as needed) */
        }

        /* Large screens */
        @media screen and (min-width: 993px) {
            .division {
                flex-direction: row;
            }

            .form.login {
                width: 30%;
                max-width: 500px;
                margin-bottom: 0;
            }

            .form.login .form-content {
                margin-bottom: 0;
            }

            /* (Add more responsive styles as needed) */
        }
    </style>

</head>

<body>
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
                    <li><a href="farmer.php"><b><u>Farmer</u></b></a></li>
                    <li><a href="history.php">History</a></li>
                    <li><a href="adminlog.php">Admin</a></li>
                    <li><a href=" javascript:void(0);" onclick="logout()">Log out</a></li>
                </ul>
            </div>
        </nav>
        <div class=" division">
            <section class="container forms" style="background-color:#ccc;">

                <div class=" form login" style="background-color:#ccc;">
                    <div class="form-content">

                        <h3>DESCRIPTION:</h3><br>
                        <h4>In case you are confused, these are the steps for this page:
                        </h4><br>
                        <ul style="font-size: 16px;  justify-content: center;">
                            <li>Select the product that you want to sell (using the drop down list on the product)
                            </li><br>
                            <li>Specify the quantity (in killogram) of what you want to sell (between 50-200kg)
                            </li><br>
                            <li>specify the cost per killogram (for the product you are willing to sell)
                            </li><br>
                            <li>Then the last step is to click on "request" in order to confirm your selling request
                            </li><br>
                            <li>After the request, we will specify when you have to drop your product to our drop off point
                            </li><br>
                            <li>from there our team will do the rest for you !
                            </li>
                        </ul><br>
                        <p style="font-size: 16px;">
                            <strong style="font-size: 18px;">NB:</strong> the payment will be done once the product has been delivered successfully! we will notify to you once that happens.
                        </p>

                    </div>
                </div>
            </section>

            <section class="container forms">

                <div class="form login">
                    <div class="form-content">
                        <h3 id="welcomeMessage">Hello <?php echo $name; ?>,</h3><br>
                        <p>Please, enter the product you would like to sell, then we will tell you how much you will get.</p><br>
                        <h4>Submit food for sale</h4>

                        <form id="requestForm">
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
                                <input type="number" placeholder="How many Kg do you have?" class="input" required id="quantity" name="quantity">
                            </div>

                            <div class="field input-field">
                                <label>Cost per Kg (SHS)<span class="required"></span></label>
                                <input type="number" placeholder="How much do you want to sell per Kg?" class="input" id="cost" name="cost" required>
                            </div><br><br><br>
                            <center>
                                <div class="field button-field">
                                    <button type="submit"><strong>Submit Request</strong></button>
                                </div>
                            </center><br>

                        </form>
                    </div>
                </div>
            </section>

            <section class="container forms">

                <div class="form login">
                    <div class="form-content">


                    </div>
                </div>
            </section>
        </div>

        </div>

        <!-- JavaScript -->
        <script>
            window.onload = function() {
                // Get the name from the URL parameters
                const urlParams = new URLSearchParams(window.location.search);
                const name = urlParams.get('name');
                const lname = urlParams.get('lname');
                const contact = urlParams.get('contact');

                // Update the welcome message
                const welcomeMessage = document.getElementById('welcomeMessage');
                welcomeMessage.textContent = `Hello ${name},`;

                // Get the form element
                const requestForm = document.getElementById('requestForm');

                // Add submit event listener to the requestForm
                requestForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent form submission

                    // Get the form data
                    const product = document.getElementById('product').value;
                    const quantity = document.getElementById('quantity').value;
                    const cost = document.getElementById('cost').value;

                    // Create the data object to be sent
                    const data = {
                        name: name, // New line: Include the name in the data object
                        lname: lname,
                        product: product,
                        quantity: quantity,
                        cost: cost,
                        contact: contact
                    };

                    // Create and configure the XMLHttpRequest object
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '<?php echo $_SERVER['PHP_SELF']; ?>', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    // Define the callback function when the request completes
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText); // Log the response from the server
                            // Assuming you have a variable named `contact` with the contact value
                            const redirectURL = `info.html?name=${name}&lname=${lname}&product=${product}&quantity=${quantity}&cost=${cost}&contact=${contact}`;
                            window.location.href = redirectURL;
                        } else {
                            console.error('Error inserting data:', xhr.status);
                        }
                    };

                    // Convert the data object to a URL-encoded string
                    const encodedData = Object.keys(data).map(key => `${encodeURIComponent(key)}=${encodeURIComponent(data[key])}`).join('&');

                    // Send the AJAX request
                    xhr.send(encodedData);
                });
            };
        </script>

    </body>

</html>
