<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize or retrieve the session data
    if (!isset($_SESSION['form_data'])) {
        $_SESSION['form_data'] = [];
    }

    // Process expertise data
    if (isset($_POST['company']) && isset($_POST['job_title']) && isset($_POST['description']) && isset($_POST['undefined'])) {
        $expertiseData = [];

        foreach ($_POST['company'] as $index => $company) {
            $expertise = [
                'company' => $company,
                'job_title' => $_POST['job_title'][$index],
                'description' => $_POST['description'][$index],
                'start_date' => $_POST['undefined'][$index],
                'end_date' => $_POST['undefined'][$index],
            ];

            // Display the collected expertise data
            echo "<h2>Expertise $index:</h2>";
            echo "Company: " . $expertise['company'] . "<br>";
            echo "Job Title: " . $expertise['job_title'] . "<br>";
            echo "Description: " . $expertise['description'] . "<br>";
            echo "Start Date: " . $expertise['start_date'] . "<br>";
            echo "End Date: " . $expertise['end_date'] . "<br>";

            $expertiseData[] = $expertise;
        }

        $_SESSION['form_data']['expertise'] = $expertiseData;
    }

    // Process formations data
    if (isset($_POST['school']) && isset($_POST['study_field']) && isset($_POST['formation_description']) && isset($_POST['formation_start_date']) && isset($_POST['formation_end_date'])) {
        $formationsData = [];

        foreach ($_POST['school'] as $index => $school) {
            $formation = [
                'school' => $school,
                'study_field' => $_POST['study_field'][$index],
                'formation_description' => $_POST['formation_description'][$index],
                'formation_start_date' => $_POST['formation_start_date'][$index],
                'formation_end_date' => $_POST['formation_end_date'][$index],
            ];

            // Display the collected formation data
            echo "<h2>Formation $index:</h2>";
            echo "School: " . $formation['school'] . "<br>";
            echo "Study Field: " . $formation['study_field'] . "<br>";
            echo "Description: " . $formation['formation_description'] . "<br>";
            echo "Start Date: " . $formation['formation_start_date'] . "<br>";
            echo "End Date: " . $formation['formation_end_date'] . "<br>";

            $formationsData[] = $formation;
        }

        $_SESSION['form_data']['formations'] = $formationsData;
    }
}
?>



<!DOCTYPE html>

<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CV Generator</title>
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
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span>Yassir WAHID (Y7T007)</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-3">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="#">TP-1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Partie 1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Partie 2</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="title-div" style="width: 509px; margin-top: 41px;">
    <h1>CV GENERATOR</h1>
</div>
<section style="margin-top: 44px;">
    <section></section>
    <div class="steps-progressbar">
        <ul>
            <li class="previous">About</li>
            <li class="previous">Expertise</li>
            <li class="active">Divers</li>
        </ul>
    </div>
    <h1 class="text-center text-capitalize" style="margin: 55px;">Divers</h1>
    <div class="container">
        <form action="process_data.php" method="POST" id="cvForm">
            <h3>Skills</h3>
            <div class="form-group mb-3">
                <!-- Skills will be dynamically added here using JavaScript -->
            </div>
            <button class="btn btn-success" type="button" id="add-skill-button">Add New Skill</button>
            <button class="btn btn-danger" type="button" id="delete-skill-button">Delete Last Skill</button>
            <br><br><br>

            <h3>Languages</h3>
            <!-- Checkbox inputs for languages -->
            <div class="row">
                <div class="col">
                    <input type="checkbox" id="english" name="language" value="English">
                    <label for="english">English</label><br>
                    <input type="checkbox" id="spanish" name="language" value="Spanish">
                    <label for="spanish">Spanish</label><br>
                    <input type="checkbox" id="mandarin" name="language" value="Mandarin">
                    <label for="mandarin">Mandarin</label><br>
                    <input type="checkbox" id="hindi" name="language" value="Hindi">
                    <label for="hindi">Hindi</label><br>
                    <input type="checkbox" id="french" name="language" value="French">
                    <label for="french">French</label><br>


                </div>
                <div class="col">

                    <input type="checkbox" id="russian" name="language" value="Russian">
                    <label for="russian">Russian</label><br>
                    <input type="checkbox" id="portuguese" name="language" value="Portuguese">
                    <label for="portuguese">Portuguese</label><br>
                    <input type="checkbox" id="indonesian" name="language" value="Indonesian">
                    <label for="indonesian">Indonesian</label><br>
                    <input type="checkbox" id="german" name="language" value="German">
                    <label for="german">German</label><br>
                    <input type="checkbox" id="arabic" name="language" value="Arabic">
                    <label for="arabic">Arabic</label><br>

                </div>
            </div>
            
            
<!--            TEXT AREA TO ADD EXTRA DIVEERS EACH TIME PUTING A WORD WITH PRESSING ENTER BUTTON, IT GOT A BORDER AROUND IT -->
            <div class="form-group mb-3">
                <br><br><br>
                <h3>Divers</h3>
                <div class="row">
                    <div class="col">
                        <textarea id="diversTextArea" onkeydown="handleEnter(event)"></textarea>

                    </div>
                    <div class="col">
                        <div id="pillContainer"></div>

                    </div>
                </div>
                <!-- Text area with a border -->

                <!-- Container for displaying pills -->

                <script>
                    // JavaScript function to add a pill for each word/sentence on pressing Enter
                    function handleEnter(event) {
                        if (event.key === "Enter") {
                            // Get the text from the textarea
                            var inputText = document.getElementById("diversTextArea").value.trim();

                            // Split the text into an array of words/sentences
                            var words = inputText.split(/\s+/);

                            // Create a pill for each word/sentence and append it to the container
                            var pillContainer = document.getElementById("pillContainer");
                            words.forEach(function (word) {
                                if (word.length > 0) {
                                    var pill = document.createElement("div");
                                    pill.className = "pill";
                                    pill.textContent = word;

                                    // Create a delete button for each pill
                                    var deleteButton = document.createElement("button");
                                    deleteButton.className = "deleteButton";
                                    deleteButton.textContent = "x";
                                    deleteButton.onclick = function () {
                                        // Remove the corresponding pill when the delete button is clicked
                                        pillContainer.removeChild(pill);
                                    };

                                    // Append the delete button to the pill
                                    pill.appendChild(deleteButton);

                                    // Append the pill to the container
                                    pillContainer.appendChild(pill);

                                    // Add hidden input field to store the pill data for form submission
                                    var hiddenInput = document.createElement("input");
                                    hiddenInput.type = "hidden";
                                    hiddenInput.name = "pillData[]";
                                    hiddenInput.value = word;
                                    pillContainer.appendChild(hiddenInput);
                                }
                            });

                            // Clear the textarea
                            document.getElementById("diversTextArea").value = '';
                        }
                    }
                </script>
                <style>
                    /* Add some basic styling for the text area */
                    textarea {
                        border: 2px solid #ccc;
                        padding: 5px;
                        width: 300px;
                        resize: none;
                    }

                    .deleteButton {
                        cursor: pointer;
                        margin-left: 5px;
                        color: #ff0000;
                        border: none;
                        background: none;
                        font-size: 12px;
                    }

                    /* Style for the pills */
                    .pill {
                        display: inline-block;
                        background-color: #f0f0f0;
                        padding: 5px;
                        margin: 5px;
                        border-radius: 10px;
                    }
                </style>
            </div>
            <br><br><br>
            <div class="justify-content-center d-flex form-group mb-3">
                <div id="submit-btn">
                    <div class="row">
                        <button class="btn btn-primary btn-light m-0 rounded-pill px-4" type="submit">Submit</button>
                    </div>
                </div>
            </div>
            

        </form>
    </div>
    <div class="col">
        <h3 id="fail" class="text-center text-danger d-none"><br>Form not Submitted&nbsp;<a href="contact.html">Try Again</a><br><br></h3>
        <h3 id="success-1" class="text-center text-success d-none"><br>Form Submitted Successfully&nbsp;<a href="contact.html">Send Another Response</a><br><br></h3>
    </div>
</section>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/Application-Form-Bootstrap-Image-Uploader.js"></script>
<script src="assets/js/Multi-step-form-script.js"></script>
<script>
    let skillCount = 0;

    // Function to create a new skill component
    function addSkill() {
        skillCount++;

        // Create new input element
        const inputElement = document.createElement('input');
        inputElement.className = 'col form-control';
        inputElement.type = 'text';
        inputElement.required = true;
        inputElement.placeholder = 'Ex. Skill';
        inputElement.name = 'skills[' + skillCount + '][name]';

        // Create new range element
        const rangeElement = document.createElement('input');
        rangeElement.className = 'col ';
        rangeElement.type = 'range';
        rangeElement.name = 'skills[' + skillCount + '][level]';

        // Create new div for the skill
        const skillDiv = document.createElement('div');

        skillDiv.className = 'row';
        skillDiv.id = 'skill_' + skillCount;
        skillDiv.appendChild(inputElement);
        skillDiv.appendChild(rangeElement);

        // Append the new skill to the form
        const formGroup = document.querySelector('.form-group');
        formGroup.appendChild(document.createElement('br'));

        formGroup.appendChild(skillDiv);
        formGroup.appendChild(document.createElement('br'));
    }

    // Function to delete the last skill component
    function deleteSkill() {
        const formGroup = document.querySelector('.form-group');
        const skills = formGroup.getElementsByClassName('row');
        const lastSkill = skills[skills.length - 1];

        // Remove the last skill
        if (lastSkill) {
            formGroup.removeChild(lastSkill);
        }
    }

    // Add event listeners to the buttons
    document.getElementById('add-skill-button').addEventListener('click', addSkill);
    document.getElementById('delete-skill-button').addEventListener('click', deleteSkill);
</script>
</body>

</html>
