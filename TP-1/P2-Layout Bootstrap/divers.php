<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Expertise
    foreach ($_POST['company'] as $key => $company) {
        echo "Company: " . htmlspecialchars($company[1]) . "<br>";
    }
    foreach ($_POST['job_title'] as $key => $job_title) {
        echo "Job Title: " . htmlspecialchars($job_title[1]) . "<br>";
    }
    foreach ($_POST['description'] as $key => $description) {
        echo "Description: " . htmlspecialchars($description[1]) . "<br>";
    }
    // Undefined fields (Starting Date and End Date) are not processed because their names are not defined in the form

    // Formation
    foreach ($_POST['school'] as $key => $school) {
        echo "School: " . htmlspecialchars($school[1]) . "<br>";
    }
    foreach ($_POST['study_field'] as $key => $study_field) {
        echo "Study Field: " . htmlspecialchars($study_field[1]) . "<br>";
    }
    foreach ($_POST['formation_description'] as $key => $formation_description) {
        echo "Formation Description: " . htmlspecialchars($formation_description[1]) . "<br>";
    }
    foreach ($_POST['formation_start_date'] as $key => $formation_start_date) {
        echo "Formation Starting Date: " . htmlspecialchars($formation_start_date[1]) . "<br>";
    }
    foreach ($_POST['formation_end_date'] as $key => $formation_end_date) {
        echo "Formation End Date: " . htmlspecialchars($formation_end_date[1]) . "<br>";
    }
    // Handle expertise form submission
    if (isset($_POST["expertise_data"])) {
        $_SESSION["expertise_data"] = $_POST["expertise_data"];
    }

    // Handle formation form submission
    if (isset($_POST["formation_data"])) {
        $_SESSION["formation_data"] = $_POST["formation_data"];
    }
}

// Echo the transmitted values
if (isset($_SESSION["firstName"])) {
    echo "First Name: " . $_SESSION["firstName"] . "<br>";
    echo "Last Name: " . $_SESSION["lastName"] . "<br>";
    echo "Title: " . $_SESSION["title"] . "<br>";
    echo "Description: " . $_SESSION["description"] . "<br>";
    echo "Date of Birth: " . $_SESSION["dob"] . "<br>";
    echo "Email: " . $_SESSION["email"] . "<br>";
    echo "Phone: " . $_SESSION["phone"] . "<br>";
    echo "Address: " . $_SESSION["address"] . "<br>";
}

if (isset($_SESSION["expertise_data"])) {
    echo "<h2>Expertise Data:</h2>";
    foreach ($_SESSION["expertise_data"] as $data) {
        echo "Company: " . $data["company"] . "<br>";
        echo "Job Title: " . $data["job_title"] . "<br>";
        echo "Description: " . $data["description"] . "<br>";
        echo "Start Date: " . $data["start_date"] . "<br>";
        echo "End Date: " . $data["end_date"] . "<br><br>";
    }
}

if (isset($_SESSION["formation_data"])) {
    echo "<h2>Formation Data:</h2>";
    foreach ($_SESSION["formation_data"] as $data) {
        echo "School: " . $data["school"] . "<br>";
        echo "Study Field: " . $data["study_field"] . "<br>";
        echo "Description: " . $data["description"] . "<br>";
        echo "Start Date: " . $data["start_date"] . "<br>";
        echo "End Date: " . $data["end_date"] . "<br><br>";
    }
}
?>
<?php
// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through all POST parameters and print their values
    foreach ($_POST as $key => $value) {
        echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
    }
} else {
    // If the form is not submitted using POST method, display an error message
    echo "Form not submitted.";
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<!-- Rest of your HTML code -->

</html>
