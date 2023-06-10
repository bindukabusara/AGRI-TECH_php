<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>

    <!-- CSS -->
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="home2.css">

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
                <li><a href="home.html"><b>Home</b></a></li>
                <li><a href="">Service</a></li>
                <li><a href="">About Us</a></li>
            </ul>
        </div>
    </nav>

    <section class="container">
        <br>
        <hr>
        <br><br><br><br><br><br><br><br><br><br><br>
        <h1>
            <center>WELCOME</center>
        </h1>
        <p>Hey! Welcome to AgriTrans, we help farmers sell food and market vendors buy food.</p><br>
        <br><br><br>
        <div class="field button-field">
            <center><button><a href="log.html"><strong style="color: rgb(0, 0, 0);">Log In</strong></a></button>
            </center>
        </div>
        <div class="form-link">
            <span>Don't have an account? <a href="signup.php" class="signup-link"><strong style="color: #A7F500;">Sign up</strong></a></span>
        </div>
    </section>

</body>

</html>
