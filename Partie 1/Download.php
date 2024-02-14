<?php
session_start();
// Generate a unique filename with a timestamp
$filename = $_SESSION['Nom']."_".$_SESSION['Prenom'] ."_". time() . ".txt";

// Open a file in write mode
$file = fopen($filename, "w");

// Write the session data into the file with formatting
fwrite($file, "************************************\n");
fwrite($file, "* Nom: " . $_SESSION['Nom'] . " \n");
fwrite($file, "* Prenom: " . $_SESSION['Prenom'] . " \n");
fwrite($file, "* Age: " . $_SESSION['Age'] . " \n");
fwrite($file, "* Email: " . $_SESSION['Email'] . " \n");
fwrite($file, "* Numero de telephone: " . $_SESSION['Gsm'] . " \n");
fwrite($file, "* Niveau: " . $_SESSION['Niveau'] . " \n");
fwrite($file, "* Annee: " . $_SESSION['Annee'] . " \n");
fwrite($file, "* Modules: " . print_r($_SESSION['modules'], true) . " \n");
fwrite($file, "* Nombre de projets realises cette annee: " . $_SESSION['nb_prj'] . " \n");
fwrite($file, "* Remarques: " . $_SESSION['remarques'] . " \n");
fwrite($file, "* Fichier Joint: " . $_SESSION['fichier_joint'] . " \n");
fwrite($file, "************************************\n");

// Close the file
fclose($file);

// Set headers to download the file
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($filename).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));

// Clear output buffer
ob_clean();
flush();

// Read the file and send it to the user
readfile($filename);

// Delete the file after download
unlink($filename);

//unset all sessions variables:
$_SESSION = array();


//redirect to the form page


// Terminate the script
exit;
header("Location: formulaire.php");
?>