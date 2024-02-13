<?php
session_start();

echo "First Name: " . $_SESSION["firstName"] . "<br>";
echo "Last Name: " . $_SESSION["lastName"] . "<br>";
echo "Title: " . $_SESSION["title"] . "<br>";
echo "Description: " . $_SESSION["description"] . "<br>";
echo "Date of Birth: " . $_SESSION["dob"] . "<br>";
echo "Email: " . $_SESSION["email"] . "<br>";
echo "Phone: " . $_SESSION["phone"] . "<br>";
echo "Address: " . $_SESSION["address"] . "<br>";
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="assets/css/Application-Form.css">
    <link rel="stylesheet" href="assets/css/Multi-step-form.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Section-Title.css">
    <link rel="stylesheet" href="assets/css/Steps-Progressbar.css">
</head>

<body>
<nav class="navbar navbar-expand-md bg-body py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <span>Yassir WAHID (Y7T007)</span>
        </a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-3">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="#">TP-1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Partie 1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Partie 2</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="title-div" style="width: 509px;margin-top: 41px;">
    <h1>CV GENERATOR</h1>
</div>
<section style="margin-top: 44px;">
    <form action="divers.php" method="POST">
        
    
    <section></section>
    <div class="steps-progressbar">
        <ul>
            <li class="previous">About</li>
            <li class="active">Expertise</li>
            <li>Divers</li>
        </ul>
    </div>
    <h1 class="text-center text-capitalize" style="margin: 55px;">expertise</h1>
    <div class="container">
        
            <div class="form-group mb-3">
                <div id="form-container"></div>

            </div>
            <div class="justify-content-center d-flex form-group mb-3">
                <button class="btn btn-success" type="button" onclick="addForm()">Add New Expertise</button>
            </div>

        <h1 class="text-center text-capitalize" style="margin: 55px;">Formation</h1>
            <div class="form-group mb-3">
                <div id="formation-container"></div>
            </div>
            <div class="justify-content-center d-flex form-group mb-3">
                <button class="btn btn-success" type="button" onclick="addFormation()">Add Another Formation</button>
            </div>

            <div class="justify-content-center d-flex form-group mb-3">
            </div>
    </div>
    <div class="col">
        <h3 id="fail" class="text-center text-danger d-none"><br>Form not Submitted&nbsp;<a href="contact.html">Try Again</a><br><br></h3>
        <h3 id="success-1" class="text-center text-success d-none"><br>Form Submitted Successfully&nbsp;<a href="contact.html">Send Another Response</a><br><br></h3>
    </div>
        <input class="btn btn-primary btn-light m-0 rounded-pill px-4" type="submit" onclick="submitForm()" value="Submit">

    </form>
</section>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/Application-Form-Bootstrap-Image-Uploader.js"></script>
<script src="assets/js/Application-Form-submit-form.js"></script>
<script src="assets/js/Multi-step-form-script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector("#submit-btn").addEventListener("click", function() {
            submitForm();
        });

        document.querySelector("#add-expertise-btn").addEventListener("click", function() {
            addExpertiseField();
        });

        document.querySelector("#add-formation-btn").addEventListener("click", function() {
            addFormationField();
        });
    });

    function addExpertiseField() {
        var expertiseForm = document.querySelector("#application-form-expertise");
        var clone = expertiseForm.querySelector(".form-group").lastElementChild.cloneNode(true);
        clone.querySelector("input").value = "";
        expertiseForm.querySelector(".form-group").appendChild(clone);
    }

    function addFormationField() {
        var formationForm = document.querySelector("#application-form-formation");
        var clone = formationForm.querySelector(".form-group").lastElementChild.cloneNode(true);
        clone.querySelector("input").value = "";
        formationForm.querySelector(".form-group").appendChild(clone);
    }

    function submitForm() {
        var expertiseData = [];
        var expertiseForm = document.getElementById("application-form-expertise");
        var expertiseFields = expertiseForm.querySelectorAll(".form-group");

        expertiseFields.forEach(function(field) {
            var data = {
                company: field.querySelector("input[name='company[]']").value,
                job_title: field.querySelector("input[name='job_title[]']").value,
                description: field.querySelector("input[name='description[]']").value,
                start_date: field.querySelector("input[name='start_date[]']").value,
                end_date: field.querySelector("input[name='end_date[]']").value
            };
            expertiseData.push(data);
        });

        var formationData = [];
        var formationForm = document.getElementById("application-form-formation");
        var formationFields = formationForm.querySelectorAll(".form-group");

        formationFields.forEach(function(field) {
            var data = {
                school: field.querySelector("input[name='school[]']").value,
                study_field: field.querySelector("input[name='study_field[]']").value,
                description: field.querySelector("input[name='formation_description[]']").value,
                start_date: field.querySelector("input[name='formation_start_date[]']").value,
                end_date: field.querySelector("input[name='formation_end_date[]']").value
            };
            formationData.push(data);
        });

        // Log data for testing (you can replace this with an AJAX request to send data to the server)
        console.log("Expertise Data:", expertiseData);
        console.log("Formation Data:", formationData);
    }
</script>
<script>
let formCounter = 1;

function addForm() {
  const formContainer = document.getElementById('form-container');

  const fieldset = document.createElement('fieldset');
  const legend = document.createElement('legend');
  const hr = document.createElement('hr');
  legend.appendChild(hr);
  fieldset.appendChild(legend);

  const rowDiv = document.createElement('div');
  rowDiv.className = 'row';

  const companyCol = createInputCol('Company Name', 'company[]');
  const jobTitleCol = createInputCol('Job Title', 'job_title[]');

  rowDiv.appendChild(companyCol);
  rowDiv.appendChild(jobTitleCol);

  const descriptionCol = createInputCol('Description', 'description[]', 'col', 'margin-top: 13px;margin-bottom: 25px;');
  const dateRow = createDateRow();

  fieldset.appendChild(rowDiv);
  fieldset.appendChild(descriptionCol);
  fieldset.appendChild(dateRow);

  formContainer.appendChild(fieldset);

  formCounter++;
}

function createInputCol(label, name, colClass = 'col', style = '') {
  const colDiv = document.createElement('div');
  colDiv.className = colClass;

  const labelElement = document.createElement('p');
  labelElement.innerHTML = `<strong>${label}</strong>`;
  colDiv.appendChild(labelElement);

  const inputElement = document.createElement('input');
  inputElement.className = 'form-control';
  inputElement.type = 'text';
  inputElement.required = true;
  inputElement.name = `${name}[${formCounter}]`;
  inputElement.placeholder = `Ex. ${label}`;
  colDiv.appendChild(inputElement);

  colDiv.style.cssText = style;

  return colDiv;
}

function createDateRow() {
  const formGroupDiv = document.createElement('div');
  formGroupDiv.className = 'form-group mb-3';

  const rowDiv = document.createElement('div');
  rowDiv.className = 'row';

  const startDateCol = createInputCol('Starting Date', 'start_date[]');
  const endDateCol = createInputCol('End Date', 'end_date[]');

  rowDiv.appendChild(startDateCol);
  rowDiv.appendChild(endDateCol);

  formGroupDiv.appendChild(rowDiv);

  return formGroupDiv;
}

</script>
<script>
let formationCounter = 1;

function addFormation() {
  const formationContainer = document.getElementById('formation-container');

  const fieldset = document.createElement('fieldset');
  const legend = document.createElement('legend');
  const hr = document.createElement('hr');
  legend.appendChild(hr);
  fieldset.appendChild(legend);

  const rowDiv = document.createElement('div');
  rowDiv.className = 'row';

  const schoolCol = createInputCol('School Name', 'school[]');
  const studyFieldCol = createInputCol('Study Field', 'study_field[]');

  rowDiv.appendChild(schoolCol);
  rowDiv.appendChild(studyFieldCol);

  const descriptionCol = createInputCol('Description', 'formation_description[]', 'col', 'margin-top: 13px;margin-bottom: 25px;');
  const dateRow = createDateRow('formation_start_date[]', 'formation_end_date[]');

  fieldset.appendChild(rowDiv);
  fieldset.appendChild(descriptionCol);
  fieldset.appendChild(dateRow);

  formationContainer.appendChild(fieldset);

  formationCounter++;
}

function createInputCol(label, name, colClass = 'col', style = '') {
  const colDiv = document.createElement('div');
  colDiv.className = colClass;

  const labelElement = document.createElement('p');
  labelElement.innerHTML = `<strong>${label}</strong>&nbsp;<span class="text-danger">*</span>`;
  colDiv.appendChild(labelElement);

  const inputElement = document.createElement('input');
  inputElement.className = 'form-control';
  inputElement.type = 'text';
  inputElement.required = true;
  inputElement.name = `${name}[${formationCounter}]`;
  inputElement.placeholder = `Ex. ${label}`;
  colDiv.appendChild(inputElement);

  colDiv.style.cssText = style;

  return colDiv;
}

function createDateRow(startDateName, endDateName) {
  const formGroupDiv = document.createElement('div');
  formGroupDiv.className = 'form-group mb-3';

  const rowDiv = document.createElement('div');
  rowDiv.className = 'row';

  const startDateCol = createInputCol('Starting Date', startDateName);
  const endDateCol = createInputCol('End Date', endDateName);

  rowDiv.appendChild(startDateCol);
  rowDiv.appendChild(endDateCol);

  formGroupDiv.appendChild(rowDiv);

  return formGroupDiv;
}

</script>
</body>

</html>
