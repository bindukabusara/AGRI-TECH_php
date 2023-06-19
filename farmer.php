<?php
include 'connection.php'; // Include the database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name']; // New line: Get the name from the form

    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['cost'];

    $contact = $_POST['contact']; // Get the contact from the form

    // Create the SQL INSERT query
    $sql = "INSERT INTO farmer (name, product, quantity, cost, contact) VALUES ('$name', '$product', '$quantity', '$cost', '$contact')"; // Include the contact in the quer

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
    <title>FARMER PAGE</title>

    <!-- CSS -->
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="Uganda Christian University.css">
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
                <h2>Farmer Page</h2><br>
                <p id="welcomeMessage"></p><br>

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

                    <div class="field button-field">
                        <button type="submit"><strong>Submit Request</strong></button>
                    </div><br>

                </form>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        window.onload = function() {
            // Get the name from the URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const name = urlParams.get('name');

            // Update the welcome message
            const welcomeMessage = document.getElementById('welcomeMessage');
            welcomeMessage.textContent = `Hey, ${name}! We can help you sell your product. Please specify the product you want to sell.`;

            // Get the form element
            const requestForm = document.getElementById('requestForm');

            // Add submit event listener to the requestForm
            requestForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                // Get the form data
                const product = document.getElementById('product').value;
                const quantity = document.getElementById('quantity').value;
                const cost = document.getElementById('cost').value;
                const contact = document.getElementById('contact').value;

                // Create the data object to be sent
                const data = {
                    name: name, // New line: Include the name in the data object
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
                        // Redirect to the Info Page with query parameters
                        const redirectURL = `info.html?name=${name}&product=${product}&quantity=${quantity}&cost=${cost}`;
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
