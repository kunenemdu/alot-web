<?php session_start(); 
error_reporting(E_ALL);
ini_set('display_errors','1');
require_once('../conn.php');
?>

<?php
//remove from table where ID...
if (isset($_POST['rid'])) :
    $rid = $_POST['rid'];
    $rsize = $_POST['rsize'];
    $sql = "DELETE FROM cart_items
    WHERE id='$rid'
    AND size='$rsize'";
    mysqli_query($conn, $sql);
    header("Location: ../view-cart.php");
endif
?>