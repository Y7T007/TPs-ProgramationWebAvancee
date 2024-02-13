<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if the form is submitted

        // Check if 'pillData' is set in the POST data
        if (isset($_POST['pillData']) && is_array($_POST['pillData'])) {
            // Store the pillData array in the session
            $_SESSION['pillList'] = $_POST['pillData'];
        }

// Check if there are pills in the session
    if (isset($_SESSION['pillList']) && is_array($_SESSION['pillList'])) {
        echo "<h2>Stored Pills:</h2>";
        echo "<ul>";
        foreach ($_SESSION['pillList'] as $pill) {
            echo "<li>$pill</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No pills stored in the session.</p>";
    }

    // Initialize or retrieve the session data
    if (!isset($_SESSION['form_data'])) {
        $_SESSION['form_data'] = [];
    }

    // Process personal information data
    $personalInfoData = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'dob' => $_POST['dob'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'image' => $_POST['image'],
        // Add more fields as needed
    ];

    $_SESSION['form_data']['personal_info'] = $personalInfoData;

    // Process expertise data
    if (isset($_POST['expertise'])) {
        $_SESSION['form_data']['expertise'] = $_POST['expertise'];
    }

    // Process formations data
    if (isset($_POST['school']) && isset($_POST['study_field']) && isset($_POST['formation_description']) && isset($_POST['formation_start_date']) && isset($_POST['formation_end_date'])) {
        $formationsData = [];

        for ($i = 1; $i <= count($_POST['school']); $i++) {
            $formation = [
                'school' => $_POST['school'][$i],
                'study_field' => $_POST['study_field'][$i],
                'formation_description' => $_POST['formation_description'][$i],
                'formation_start_date' => $_POST['formation_start_date'][$i],
                'formation_end_date' => $_POST['formation_end_date'][$i],
            ];

            $formationsData[] = $formation;
        }

        $_SESSION['form_data']['formations'] = $formationsData;
    }

    // Process skills and languages data
    if (isset($_POST['skills']) && isset($_POST['language'])) {
        $skillsData = $_POST['skills'];
        $languagesData = $_POST['language'];

        $_SESSION['form_data']['skills'] = $skillsData;
        $_SESSION['form_data']['languages'] = $languagesData;
    }
}

// Display the collected data
echo "<h2>Personal Information:</h2>";
echo "<pre>";
print_r($_SESSION['form_data']['personal_info']);
echo "</pre>";

echo "<h2>Expertise:</h2>";
echo "<pre>";
print_r($_SESSION['form_data']['expertise']);
echo "</pre>";

echo "<h2>Formations:</h2>";
echo "<pre>";
print_r($_SESSION['form_data']['formations']);
echo "</pre>";

echo "<h2>Skills:</h2>";
echo "<pre>";
print_r($_SESSION['form_data']['skills']);
echo "</pre>";

echo "<h2>Languages:</h2>";
echo "<pre>";
print_r($_SESSION['form_data']['languages']);
echo "</pre>";
?>
