<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('../conn.php');
?>
<?php
//destroy contents of cart_array
if (isset($_GET['removeall'])) :
    $sql = "DELETE FROM cart_items";
    mysqli_query($conn, $sql);
    header("Location: ../view-cart.php");
endif
?>
<?php
// $products = mysqli_query($conn, $sql);
if (isset($_POST['pid']) || isset($_POST['size']) || isset($_POST['quantity'])) :
    $pid = $_POST['pid'];
    $postsize = $_POST['size'];
    $postquantity = $_POST['quantity'];
    $postprice = $_POST['price'];
    $sql = "SELECT * FROM cart_items c";

    $products = mysqli_query($conn, $sql);

    $resultCheck = mysqli_num_rows($products);
    if ($resultCheck > 0) {
        while ($product = mysqli_fetch_assoc($products)) {
            if ($pid == $product['id'] && $postsize == $product['size']) {
                $newquantity = $postquantity + $product['quantity'];
                $newprice = $postprice * $newquantity;
                $sql = "UPDATE cart_items SET quantity = '$newquantity', finalprice = '$newprice'
                WHERE id = '$pid'";
                mysqli_query($conn, $sql);
                header("Location: ../view-cart.php");
                exit();
            }
            else {
                $newprice = $postprice * $postquantity;
                $sql = "INSERT INTO cart_items (id, size, quantity, finalprice) VALUES('$pid','$postsize','$postquantity','$newprice')";
                mysqli_query($conn, $sql);
                header("Location: ../view-cart.php");
                exit();
            }
        }
    } 
    else {
        $newprice = $postprice * $postquantity;
        $sql = "INSERT INTO cart_items (id, size, quantity, finalprice) VALUES('$pid','$postsize','$postquantity','$newprice')";
                mysqli_query($conn, $sql);
                header("Location: ../view-cart.php");
                exit();
    } 
    else :
    header("Location: ../view-cart.php");
    exit();
endif
?>


</html>