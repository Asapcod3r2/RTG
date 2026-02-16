<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $area = htmlspecialchars($_POST['area']);
    $quantity = (int)$_POST['quantity'];

    $price = ($quantity >= 10) ? 18 : 25;
    $total = $price * $quantity;

    $to = "your-email@example.com"; // 🔴 CHANGE THIS
    $subject = "🔥 New RTG Firewood Order";

    $message = "
    NEW ORDER - READY TO GO (RTG)

    Name: $name
    Phone: $phone
    Address: $address
    Area: $area
    Quantity: $quantity packs
    Price per pack: R$price
    Total Cost: R$total
    ";

    $headers = "From: orders@rtgfirewood.co.za";

    if(mail($to,$subject,$message,$headers)){
        echo "<h2>Order Sent Successfully!</h2>";
        echo "<p>Total Cost: R$total</p>";
        echo "<a href='index.html'>Go Back</a>";
    } else {
        echo "<h2>Something went wrong. Please try again.</h2>";
        echo "<a href='index.html'>Go Back</a>";
    }
}

?>
