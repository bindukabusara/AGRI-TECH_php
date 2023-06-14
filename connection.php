<?php
$connection = new mysqli('localhost', 'root', '', 'agri-tech');

if ($connection) {
    echo "";
} else {
    die(mysqli_error($connection));
}
