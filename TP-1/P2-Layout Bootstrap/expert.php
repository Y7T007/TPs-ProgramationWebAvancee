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

// Store data in session
    $_SESSION["firstName"] = $_POST["firstName"];
    $_SESSION["lastName"] = $_POST["lastName"];
    $_SESSION["title"] = $_POST["title"];
    $_SESSION["description"] = $_POST["description"];
    $_SESSION["dob"] = $_POST["dob"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["phone"] = $_POST["phone"];
    $_SESSION["address"] = $_POST["address"];
    $_SESSION["image"] = $_POST["image"];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get the contents of the uploaded file
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        // Store the image data in the session
        $_SESSION['image'] = base64_encode($imageData);
    }
    // Add more fields as needed

    // Redirect to the next page
    header("Location: exper.php");
    exit();
}

