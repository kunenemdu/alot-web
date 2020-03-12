<?php
require_once('../conn.php');
$sql = "DELETE FROM cart_items";
mysqli_query($conn,$sql);

session_start();
session_unset(); //delete the values inside the session variables
session_destroy();

header("Location: ../index.php");