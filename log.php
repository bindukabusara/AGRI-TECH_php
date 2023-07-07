<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = $_POST['contact'];

    // Prepare and execute the query to fetch user data based on the phone number
    $stmt = $connection->prepare("SELECT * FROM users WHERE contact = ?");
    $stmt->bind_param("s", $contact);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with the provided phone number exists in the database
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $role = $user['role'];

        if ($role === 'farmer') {
            // Redirect to farmer page
            header("Location: farmer.php?name=" . $user['name']);
            exit();
        } elseif ($role === 'whole seller') {
            // Redirect to order page for whole seller
            header("Location: order.php");
            exit();
        }
    } else {
        echo "User not found.";
    }
}
?>


<!--code HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>

    <!-- CSS -->
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="Uganda Christian University.css">

    <!-- Boxicons css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--code css wich makes the page reponsive-->
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

            .form {
                position: absolute;
                max-width: 460px;
                width: 100%;
                height: 480px;
                padding: 30px;
                border-radius: 10px;
                background: #fff;

            }
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
                <li><a href="admin.html">Admin</a></li>
            </ul>
        </div>
    </nav>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <h2>
                    <pre>Log in</pre>
                </h2><br>
                <p>Hey, Welcome back! Please enter the phone number that you used to create your account</p><br>

                <form method="POST" action="#">
                    <div class="field input-field">
                        <label for="contact">Phone Number<span class="required"></span></label>
                        <input type="number" id="contact" name="contact" placeholder="Phone Number" class="input" required>
                    </div><br><br><br>

                    <div class="field button-field">
                        <button><strong>Log in</strong></button>
                    </div>

                    <div class="form-link">
                        <span>Don't have an account? <a href="singup.php" class="signup-link">Sign up</a></span>
                    </div>
                </form>
            </div>
        </div>
    </section>


</body>

</html>
