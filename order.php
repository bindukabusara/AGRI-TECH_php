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
    <script>
        // Get the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const name = urlParams.get('name');

        // Get references to the elements
        const greetingMessage = document.getElementById('greetingMessage');
        const productSelect = document.getElementById('product');
        const quantityInput = document.getElementById('quantity');
        const totalCostInput = document.getElementById('totalCost');

        // Update the greeting message with the name
        const welcomeMessage = document.getElementById('greetingMessage');
        greetingMessage.textContent = `Hey ${name}, do you want to order grains (beans, Rice, Wheat, etc.) and get them delivered to your market?`;

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
    </script>


</body>

</html>
