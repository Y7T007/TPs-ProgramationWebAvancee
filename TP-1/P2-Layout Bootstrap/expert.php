<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    // Add more fields as needed

    // Store data in session variables
    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["title"] = $title;
    $_SESSION["description"] = $description;
    $_SESSION["dob"] = $dob;
    $_SESSION["email"] = $email;
    $_SESSION["phone"] = $phone;
    $_SESSION["address"] = $address;
    // Add more fields as needed

    // Redirect to the next page
    header("Location: exper.php");
    exit();
}

