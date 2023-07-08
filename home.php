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
        @media screen and (min-width: 893px) {
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
                <li><img src="logoa.png" alt="logo" width="100px" length="100px"></li>
                <li><a href="home.php"><b><u>Home</u></b></a></li>
                <li><a href="admin.html">Admin</a></li>
            </ul>
        </div>
    </nav>

    <section class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <h1>
            <center>Trade food easily</center>
        </h1>

        <p>
          <strong>AgriTrans</strong>: Connecting farmers and market vendors <br>for easy food sales and purchases.
        </p>
        <br>
        <br>

        <!--button-->
        <div class="field button-field">
            <center>
                <form>
                    <div class="button-container">
                        <button class="button" type="submit"><a href="log.php"><strong style="color: #000;">LOG IN</strong></a></button>
                        <button class="button" type="submit"><a href="singup.php"><strong style="color: #000;">SIGN UP</strong></a></button>
                    </div>
                </form>
            </center>
        </div>

    </section>

</body>

</html>
