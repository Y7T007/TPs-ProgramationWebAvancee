<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CV Resume</title>
	<meta charset="UTF-8">
	<meta name="description" content="Y7T007 - CV Resume">
	<meta name="keywords" content="resume, civic, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/style.css"/>



    <!-- Include pdfmake library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <!-- Include html-to-pdfmake library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html-to-pdfmake/0.1.4/html-to-pdfmake.js"></script>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body style="width: 2000px;height: 2400px">
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<div class="home-four-style" id="CV">

		<div class="container-fluid p-0">
			<div class="row m-0">
				<div class="col">
					<div class="main-left-area h-100">
                        <button type="button" onclick="generatePDF()" class="btn btn-success">Download as PDF</button>
                        <button type="button" onclick="takeScreenshot()" class="btn btn-primary">Download as Image</button>

                        <!-- hero section -->
						<section class="intro-section">
							<figure class="hero-image">
                                <?php
                                if (isset($_SESSION['image'])) {

                                $imageData = base64_decode($_SESSION['image']);
                                } else {
                                    echo 'No image data found in the session.';
                                }
                                echo '<img style="height:500px" id="profile" src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="">';

                                ?>
							</figure>
                            <script>
                                // JavaScript function to read the selected file and display the image
                                function readURL(input) {
                                    var uploadedImage = document.getElementById('profile');

                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            // Set the source of the image element to the data URL of the selected file
                                            uploadedImage.src = e.target.result;
                                            // Display the image
                                            uploadedImage.style.display = 'block';
                                        };

                                        // Read the selected file as a data URL
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
							<div class="hero-text">
								<h2><?php echo($_SESSION["firstName"]);?><br><?php echo($_SESSION["lastName"]);?></h2>
								<p><?php echo($_SESSION["title"]);?></p>
							</div>
							<p class="mb-5"><?php echo($_SESSION["description"]);?></p>
							<div class="hero-info pt-5">
								<h2>General Info</h2>
								<ul>
									<li><span>Date of Birth</span><?php echo($_SESSION["dob"]);?></li>
									<li><span>Address</span><?php echo($_SESSION["address"]);?></li>
									<li><span>E-mail</span><?php echo($_SESSION["email"]);?></li>
									<li><span>Phone </span><?php echo($_SESSION["phone"]);?></li>
								</ul>
							</div>
						</section>
						<!-- extra section -->
						<section class="extra-section spad">
							<div class="section-title">
								<h2>Extra Skills</h2>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
                                    <style>
                                        /* Style for the pills */
                                        .pill {
                                            display: inline-block;
                                            background-color: #f0f0f0;
                                            padding: 15px;
                                            margin: 15px;
                                            border-radius: 10px;
                                        }
                                    </style>
                                    <div class="row">
                                        <div id="pillContainer" style="display: flex;flex-flow: wrap;margin-top: -100px;margin-bottom: 150px  ">


                                            <?php
                                            // Check if the form is submitted

                                           

                                            // Check if there are pills in the session
                                            if (isset($_SESSION['pillList']) && is_array($_SESSION['pillList'])) {
                                                echo "<ul>";
                                                foreach ($_SESSION['pillList'] as $pill) {
                                                    echo "<li class='pill'>$pill</li>";
                                                }
                                                echo "</ul>";
                                            } else {
                                                echo "<p>No pills stored in the session.</p>";
                                            }

                                            // Initialize or retrieve the session data
                                            if (!isset($_SESSION['form_data'])) {
                                                $_SESSION['form_data'] = [];
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>

							</div>
							<div class="section-title">
								<h2>Languages</h2>
							</div>
							<ul class="language-progress" >
                                <?php 
                                foreach ($_SESSION['form_data']['languages'] as $language) {
                                    echo "<li>$language <div class='lan-prog' data-lanprogesss='5'></div></li>";
                                }
                                ?>
<!--								<li>English <div class="lan-prog" data-lanprogesss="5"></div></li>-->
<!--								<li>Spanish <div class="lan-prog" data-lanprogesss="4"></div></li>-->
<!--								<li>Chinesse <div class="lan-prog" data-lanprogesss="3"></div></li>-->
							</ul>
						</section>

<!--						<div class="social-links">-->
<!--							<a href=""><i class="fa fa-pinterest"></i></a>-->
<!--							<a href=""><i class="fa fa-linkedin"></i></a>-->
<!--							<a href=""><i class="fa fa-instagram"></i></a>-->
<!--							<a href=""><i class="fa fa-facebook"></i></a>-->
<!--							<a href=""><i class="fa fa-twitter"></i></a>-->
<!--						</div>-->
					</div>
				</div>
				<div class="col">
					<div class="main-right-area">
						<!-- Resume section start -->
						<section class="resume-section spad pt-0">
							<div class="section-title">
								<h2>Work Experience</h2>
							</div>
							<ul class="resume-list">
                                <?php 
                                foreach ($_SESSION['form_data']['expertise'] as $experience) {
                                    $startYear = date('Y', strtotime($experience['start_date']));
                                    $endYeaar = date('Y', strtotime($experience['end_date']));

                                    echo "<li>";
                                    echo "<h2>".$startYear."-".$endYeaar."</h2>";
                                    echo "<h3>".$experience['company']."</h3>";
                                    echo "<h4>".$experience['job_title']."</h4>";
                                    echo "<p>".$experience['description']."</p>";
                                    echo "</li>";
                                }
                                ?>
								
							</ul>
						</section>
						<!-- Resume section end -->

						<!-- Resume section start -->
						<section class="resume-section">
							<div class="section-title">
								<h2>Education</h2>
							</div>
							<ul class="resume-list">
                                <?php
                                foreach ($_SESSION['form_data']['formations'] as $formation) {
                                    $startYear = date('Y', strtotime($formation['formation_start_date']));
                                    $endYeaar = date('Y', strtotime($formation['formation_end_date']));

                                    echo "<li>";
                                    echo "<h2>".$startYear."-".$endYeaar."</h2>";
                                    echo "<h3>".$formation['school']."</h3>";
                                    echo "<h4>".$formation['study_field']."</h4>";
                                    echo "<p>".$formation['formation_description']."</p>";
                                    echo "</li>";
                                }
                                ?>
								
							</ul>
						</section>
						<!-- Resume section end -->

						

						<!-- skill section start -->
						<div class="skill-section">
							<div class="section-title">
                                <br><br><br>
                                
								<h2>Skills</h2>
							</div>
							<!-- progress bars -->
							<div class="skills">
                            <?php
                            foreach ($_SESSION['form_data']['skills'] as $skill) {
                                echo "<div class='single-progress-item'>";
                                echo "<div class='progress-bar-style' data-progress='".$skill['level']."'></div>";
                                echo "<p>".$skill['name']."</p>";
                                echo "</div>";
                            }
                            ?>
							</div>
                            <button id="downloadPdf">Download PDF</button>

                            <script>
                                // JavaScript code for PDF generation
                                document.getElementById('downloadPdf').addEventListener('click', function () {
                                    // Target the HTML element to be converted to PDF
                                    var element = document.getElementById('html'); // Change 'yourRootElementId' to the actual ID of the root element

                                    // Convert HTML to pdfmake format
                                    var pdfMakeContent = htmlToPdfmake(element.innerHTML);

                                    // Create a pdfmake document
                                    var docDefinition = {
                                        content: pdfMakeContent
                                    };

                                    // Generate PDF
                                    pdfMake.createPdf(docDefinition).download('generated-pdf.pdf');
                                });
                            </script>
                            <!-- icon boxes -->
<!--							<div class="icon-box-area spad">-->
<!--								<div class="icon-box">-->
<!--									<i class="flaticon-032-cooking"></i>-->
<!--									<p>Cooking</p>-->
<!--								</div>-->
<!--								<div class="icon-box">-->
<!--									<i class="flaticon-015-photo-camera"></i>-->
<!--									<p>Photography</p>-->
<!--								</div>-->
<!--								<div class="icon-box">-->
<!--									<i class="flaticon-013-chess-1"></i>-->
<!--									<p>Playing Chess</p>-->
<!--								</div>-->
<!--								<div class="icon-box">-->
<!--									<i class="flaticon-001-yoga"></i>-->
<!--									<p>Yoga</p>-->
<!--								</div>-->
<!--								<div class="icon-box">-->
<!--									<i class="flaticon-035-tent"></i>-->
<!--									<p>Camping in nature</p>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
						<!-- skill section end -->
					</div>
				</div>
			</div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script>
            // JavaScript code for PDF generation
            document.getElementById('downloadPdf').addEventListener('click', function () {
                // Target the HTML element to be converted to PDF
                var element = document.querySelector('html'); // Change 'yourRootElementId' to the actual ID of the root element

                // Generate PDF
                html2pdf(element);
            });
        </script>
	<!-- Footer section start -->

	<!-- Footer section end -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


        <!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
<!--        <button onclick="generatePDF()">Download PDF</button>-->
<!--        <button onclick="takeScreenshot()">Download Image</button>-->


        <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js" defer></script>

        <script>
            function takeScreenshotAndDownloadPdf(delay) {
                setTimeout(function () {
                    takeScreenshotAndSubmitForm();  // Call your original capture function and submit the form
                }, delay);
            }

            function takeScreenshot() {
                var elementToCapture = document.getElementById("CV");
                html2canvas(elementToCapture,).then(function (canvas) {
                    var image = canvas.toDataURL("image/png");
                    var link = document.createElement('a');
                    link.href = image;
                    link.download = 'screenshot.png';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                });
            }

            function takeScreenshotAndSubmitForm() {
                var elementToCapture = document.getElementById("CV");
                html2canvas(elementToCapture).then(function (canvas) {
                    var image = canvas.toDataURL("image/png");

                    // Create FormData object and append the image data
                    var formData = new FormData();
                    formData.append("Files[0]", image);

                    // Create and configure XMLHttpRequest
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "https://v2.convertapi.com/convert/images/to/pdf?Secret=SHpJngUdcAm29CN6&download=attachment", true);

                    // Set up event listeners for success and error
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            // Success, you can handle the response here if needed
                            console.log("Conversion successful");
                        } else {
                            // Error handling
                            console.error("Error in conversion:", xhr.status, xhr.statusText);
                        }
                    };

                    // Send the FormData object as the request body
                    xhr.send(formData);
                });
            }

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
        <script>
            function generatePDF() {
                // Créer une instance de jsPDF
                var doc = new jsPDF();

                // Options pour la génération du PDF
                var options = {
                    background: '#fff', // Couleur de fond
                    pagesplit: true // Fractionnement automatique des pages en fonction du contenu
                };

                // Convertir la page HTML en canvas à l'aide de html2canvas
                html2canvas(document.body, options).then(function(canvas) {
                    // Convertir le canvas en image au format JPEG
                    var imgData = canvas.toDataURL('image/jpeg');

                    // Ajouter l'image au document PDF
                    doc.addImage(imgData, 'JPEG', 0, 0, doc.internal.pageSize.getWidth(), doc.internal.pageSize
                        .getHeight());

                    // Enregistrer le PDF
                    doc.save('cv.pdf');
                });
            }
        </script>



</body>

</html>

