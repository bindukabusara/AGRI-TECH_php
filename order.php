<?php
include 'connection.php'; // Include the database connection file

// Check if the form is submitted
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $totalCost = $_POST['totalCost'];
    $contact = $_POST['contact'];

    // Create the SQL INSERT query
    $sql = "INSERT INTO `order` (name, product, quantity, totalCost, contact) VALUES ('$name', '$product', '$quantity', '$totalCost', '$contact')";

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
    <title>ORDER page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="Uganda Christian University.css">

    <!-- Boxicons css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
                max-width: 350px;
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
                max-width: 450px;
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
                max-width: 550px;
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

    <nav class="navlist">
        <div class="sub">
            <ul>
                <li>
                    <img src="logoa.png" alt="logo" width="100px" length="100px">
                </li>
                <li><a href="home.php"><b>Home</b></a></li>
                <li><a href="">Service</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="admin.html">Admin</a></li>
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
                        <li>Select the product that you want to buy (using the drop down list on the product)
                        </li><br>
                        <li>specify the quantity (in killogram) of what you want to buy (between 50-200kg)
                        </li><br>
                        <li>the total cost will be automatically displayed for you in order to confirm.
                        </li><br>
                        <li>If you confirm, you will be asked to pay the amount displayed
                        </li><br>
                        <li>Then you will be requested to submit your order to be worked on
                        </li><br>
                        <li>From there our team will do the rest for you !
                        </li>
                    </ul><br>
                    <p style="font-size: 16px;">
                        <strong style="font-size: 18px;">NB:</strong>you will be requested to notify once you've received the product, and that action will confirm the farmer's payment. If there is any issue, we will keep in touch with you H24 in order to work on each and every concen you might have.

                </div>
            </div>
        </section>

        <section class="container forms">
            <h1>Agri<span>Trans</span></h1>
            <div class="form login">
                <div class="form-content">
                    <h4 id="greetingMessage"></h4><br>
                    <p>Do you want to order grains (beans, Rice, Wheat, etc.) and get them delivered to your market?</p><br>
                    <h4>Make your order</h4>
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
                            <input type="number" placeholder="50-200" class="input" min="50" max="200" value="50" required id="quantity" name="quantity">
                        </div>
                        <div class="field input-field">
                            <label>Total Cost (SHS)</label>
                            <input type="number" placeholder="" class="input" id="totalCost" name="totalCost" readonly>
                        </div><br><br><br>
                        <center>
                            <div class="field button-field">
                                <button type="submit"><strong>Complete Order</strong></button>
                            </div>
                        </center>
                        <br>
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

    <!-- JavaScript -->
    <script>
        // Get the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const name = urlParams.get('name');
        const contact = urlParams.get('contact');

        // Get references to the elements
        const greetingMessage = document.getElementById('greetingMessage');
        const productSelect = document.getElementById('product');
        const quantityInput = document.getElementById('quantity');
        const totalCostInput = document.getElementById('totalCost');

        // Update the greeting message with the name
        greetingMessage.textContent = `Hello ${name}, `;

        // Add an event listener to detect changes in the inputs
        productSelect.addEventListener('change', updateTotalCost);
        quantityInput.addEventListener('input', updateTotalCost);

        function updateTotalCost() {
            // Get the selected product and quantity entered by the user
            const selectedProduct = productSelect.value;
            const quantity = parseFloat(quantityInput.value);

            // Define the unit cost based on the selected product in shillings
            let unitCost;
            if (selectedProduct === 'beans') {
                unitCost = 3500; // Sample unit cost for beans in shillings
            } else if (selectedProduct === 'rice') {
                unitCost = 4000; // Sample unit cost for rice in shillings
            } else if (selectedProduct === 'wheat') {
                unitCost = 3800; // Sample unit cost for wheat in shillings
            } else if (selectedProduct === 'maize') {
                unitCost = 2000; // Sample unit cost for wheat in shillings
            } else if (selectedProduct === 'peas') {
                unitCost = 2500; // Sample unit cost for wheat in shillings
            } else {
                unitCost = 0; // If no product is selected, set the unit cost to 0
            }

            // Perform the multiplication and update the total cost field
            const totalCost = unitCost * quantity;

            totalCostInput.value = isNaN(totalCost) ? '' : totalCost.toFixed(2);
        }

        // Add an event listener to the form's submit event
        const requestForm = document.getElementById('requestForm');
        requestForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Gather the form data
            const formData = new FormData(requestForm);

            // Create and configure the XMLHttpRequest object
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo $_SERVER['PHP_SELF']; ?>', true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            // Define the callback function when the request completes
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText); // Log the response from the server
                    // Redirect to the Info Page with query parameters
                    const redirectURL = `info2.html?name=${name}&product=${productSelect.value}&quantity=${quantityInput.value}&totalCost=${totalCostInput.value}`;
                    window.location.href = redirectURL;
                } else {
                    console.error('Error inserting data:', xhr.status);
                }
            };

            // Send the AJAX request
            xhr.send(formData);
        });
    </script>
</body>

</html>
