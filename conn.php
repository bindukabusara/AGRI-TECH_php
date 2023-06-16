<?php
$conn = new mysqli('localhost', 'root', '', 'agri-tech');

if ($conn) {
    echo "";
} else {
    die(mysqli_error($connection));
}
