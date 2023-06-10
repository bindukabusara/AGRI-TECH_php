<?php
$connection = new mysqli('localhost', 'root', '', 'agri-tech');

if ($connection) {
    echo "Connection established";
} else {
    die(mysqli_error($connection));
}
