<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $role = $_POST['role'];

    $sql = "INSERT INTO `users` (name, contact, role)
    VALUES ('$name', '$contact', '$role')";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "Data inserted successfully:<br>";
        echo "Name: $name<br>";
        echo "Contact: $contact<br>";
        echo "Role: $role";
        if ($role === 'farmer') {
            header("Location: farmer.php?name=$name");
            exit();
        } elseif ($role === 'whole seller') {
            header("Location: order.html");
            exit();
        }
    } else {
        die(mysqli_error($connection));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="sign.css">
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
        <div class="form login">
            <div class="form-content">
                <h2>
                    <pre>Agri<span>Trans</span>  Sign Up</pre>
                </h2><br>
                <p>Hey, Enter your details</p>
                <form method="post" id="userForm" onsubmit="redirectToPage(event)">
                    <div class="field input-field">
                        <label for="name">Name<span class="required"></span></label>
                        <input type="text" placeholder="Name" class="input" id="name" name="name" required>
                    </div>
                    <div class="field input-field">
                        <label for="contact">Phone Number<span class="required"></span></label>
                        <input type="number" placeholder="Phone Number" class="input" id="contact" name="contact" required>
                    </div>
                    <div class="field input-field">
                        <label for="role"></label>
                        <select class="selectProduct" id="role" name="role" required>
                            <option value="" selected="selected">-- Please select --</option>
                            <option value="farmer">Farmer</option>
                            <option value="whole seller">Whole seller</option>
                        </select>
                    </div><br>
                    <div class="field button-field">
                        <button type="submit" name="submit"><strong>Sign up</strong></button>
                    </div><br>
                    <div class="form-link">
                        <span>Already have an account? <a href="log.php" class="signup-link">Log in</a></span>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- JavaScript -->

</body>


</html>
<!-- Javascript -->

<!--<script>
        function redirectToPage(event) {
            event.preventDefault(); // Prevent the default form submission
            const nameInput = document.getElementById('name');
            const name = nameInput.value;
            const roleSelect = document.getElementById('role');
            const selectedOption = roleSelect.value;
            const contactInput = document.getElementById('contact');
            const contact = contactInput.value;

            if (selectedOption === 'farmer') {
                window.location.href = `farmer.html?name=${name}`; // Redirect to farmer page with name parameter
            } else if (selectedOption === 'whole seller') {
                window.location.href = 'order.html'; // Redirect to whole seller page
            }
        }
    </script>-->
