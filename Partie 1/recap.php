<?php
error_reporting(E_ERROR | E_PARSE);

session_start();

// Store form data in session variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['Nom'] = $_POST['Nom'];
    $_SESSION['Prenom'] = $_POST['Prenom'];
    $_SESSION['Age'] = $_POST['Age'];
    $_SESSION['Email'] = $_POST['Email'];
    $_SESSION['Gsm'] = $_POST['Gsm'];
    $_SESSION['Niveau'] = $_POST['Niveau'];
    $_SESSION['Annee'] = $_POST['Annee'];
    $_SESSION['modules'] = $_POST['modules'];
    $_SESSION['nb_prj'] = $_POST['nb_prj'];
    $_SESSION['remarques'] = $_POST['remarques'];

    // Check if file was uploaded
    if (isset($_FILES['fichier_joint'])&& !isset($_SESSION['fichier_joint_name'])) {
        // Move the uploaded file to a temporary location
        $tmp_name = $_FILES['fichier_joint']['tmp_name'];
        $new_location = "uploads/" . $_FILES['fichier_joint']['name'];
        move_uploaded_file($tmp_name, $new_location);

        // Check if the file exists before reading its content
        if (file_exists($new_location)) {
            $file_content = file_get_contents($new_location);
        } else {
            $file_content = '';
        }

        // Store the file content into the session
        $_SESSION['fichier_joint'] = $file_content;
    }
    if (isset($_FILES['fichier_joint'])&& !isset($_SESSION['fichier_joint_name'])) {
        // Move the uploaded file to a temporary location
        $tmp_name = $_FILES['fichier_joint']['tmp_name'];
        $new_location = "uploads/" . $_FILES['fichier_joint']['name'];
        move_uploaded_file($tmp_name, $new_location);

        // Check if the file exists before reading its content
        if (file_exists($new_location)) {
            $file_content = file_get_contents($new_location);
        } else {
            $file_content = '';
        }

        // Store the file content and name into the session
        $_SESSION['fichier_joint'] = $file_content;
        $_SESSION['fichier_joint_name'] = $_FILES['fichier_joint']['name'];
    }
}

echo '<h1 class="text-center">Recapitulation</h1>';
echo '<table class="table">';
echo '<tr><th>Nom</th><td>' . $_SESSION['Nom'] . '</td></tr>';
echo '<tr><th>Prenom</th><td>' . $_SESSION['Prenom'] . '</td></tr>';
echo '<tr><th>Age</th><td>' . $_SESSION['Age'] . '</td></tr>';
echo '<tr><th>Email</th><td>' . $_SESSION['Email'] . '</td></tr>';
echo '<tr><th>Numero de telephone</th><td>' . $_SESSION['Gsm'] . '</td></tr>';
echo '<tr><th>Niveau</th><td>' . $_SESSION['Niveau'] . '</td></tr>';
echo '<tr><th>Annee</th><td>' . $_SESSION['Annee'] . '</td></tr>';
echo '<tr><th>Modules</th><td>' . print_r($_SESSION['modules'], true) . '</td></tr>';
echo '<tr><th>Nombre de projets realises cette annee</th><td>' . $_SESSION['nb_prj'] . '</td></tr>';
echo '<tr><th>Remarques</th><td>' . $_SESSION['remarques'] . '</td></tr>';
echo '<tr><th>Fichier Joint</th><td>' . $_SESSION['fichier_joint_name'] . '</td></tr>';
echo '</table>';

echo '<a href="formulaire.php" class="btn btn-primary">Return to Edit</a> ';
echo '<a href="Download.php" class="btn btn-success">Download</a>';
?>