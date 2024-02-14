<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;

// Instantiate the Dompdf class
$dompdf = new Dompdf();

// Load HTML content from a PHP file
ob_start();
include './home4.php'; // Change './home4.php' to your actual PHP file name
$htmlContent = ob_get_clean();
$dompdf->loadHtml($htmlContent);

// (Optional) Set the base path for relative links
$dompdf->setBasePath(__DIR__);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait'); // Adjust as needed

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("your_page", array("Attachment" => 1)); // Set to 1 for download, 0 for preview
?>
