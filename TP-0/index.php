<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TP - 0</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<?php
// Dans ce cas, j'ai utilisé 3 critères pour valider un email:
function validateEmail($email)
{
    // 1. Vérifier si l'email est vide
    if (empty($email)) {
        return false;
    }

    // 2. Vérifier si l'email est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    // 3. Vérifier si le domaine de l'email existe
    $domain = explode('@', $email)[1];
    if (!checkdnsrr($domain, 'MX')) {
        return false;
    }

    return true;
}

function saveInvalidEmails($invalidEmails)
{
    $invalidEmailsText = implode(PHP_EOL, $invalidEmails);
    file_put_contents('NonValidMails.txt', $invalidEmailsText);
}


function removeDuplicates($emails)
{
    sort($emails); 
    $uniqueEmails = array_values(array_unique($emails));
    $updatedEmails = implode(PHP_EOL, $uniqueEmails);
    file_put_contents('EmailsT.txt', $updatedEmails);

    return $uniqueEmails; 
}
?>

<body>
<div class="table-responsive">
<!--    <h1>Q0 : afficher tous les emails dans le fichier Emails.txt</h1>-->
    <table class="table">
        <thead>
        <tr>
            <th>File: Emails.txt</th>
            <th>Status</th>
            <th>Frequency</th>
        </tr>
        </thead>
        <tbody>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="#">TP - 0</a>
                <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link active" ">Author : Yassir WAHID (Y7T007)</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        Importer un nouveat fichier texte contenant les emails :
        <br><i> (Si aucun fichier n'a ete importer le fichier Emails.txt par defaut sera charger)</i>
        <div style="display: flex;flex-direction: row;justify-content:space-evenly;align-items: center">
             <input type="file" name="file" id="file" onchange="displayFileContent(this)">

            
            <div id="file-content" style="border: 1px solid black; padding: 10px; margin-top: 20px;width: 50%">
                
            </div>
            
            <script>
                function displayFileContent(fileInput) {
                    let file;

                    if (fileInput && fileInput.files.length > 0) {
                        file = fileInput.files[0];
                    } else {
                        fetch('./Emails.txt')
                            .then(response => response.text())
                            .then(content => {
                                document.getElementById('file-content').innerText = content;
                            })
                            .catch(error => console.error('Error:', error));
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const content = e.target.result;
                        document.getElementById('file-content').innerText = content;
                    };
                    reader.readAsText(file);
                }

                displayFileContent(null);
            </script>
        </div>
        <br>
        <h2>Q1: Suppression des  emails invalides</h2>
        <br>
        <div style="display: flex;flex-direction: row;justify-content:space-evenly;align-items: center">
            <div style="width: 50%; height: 400px;display: flex;flex-direction: column;justify-content:space-between;align-items: center">
                <h4>Nouveau contenu</h4>
                <div id="nouv_fich" style="width:300px;height: 350px;overflow: scroll">
                    <?php
                    $emails = file('./Emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    if (isset($emails)) {
                        $invalidEmails = [];
                        $validEmails = [];
                        foreach ($emails as $email) {
                            if(validateEmail($email) ){ echo( "$email "."<br>");}
                            echo "$email  ";
                            $validEmails[] = $email;

                            if (!validateEmail($email)) {
                                $invalidEmails[] = $email; 
                            }
                        }
                        $validEmailsText = implode(PHP_EOL, $validEmails);
                        file_put_contents('Emails.txt', $validEmailsText);
                    }
                    ?>
                </div>
                <a href="./EmailsT.txt" download>Telecharger le nouveau fichier</a>
            </div>
            <div style="width: 50%; height: 400px;display: flex;flex-direction: column;justify-content:space-between;align-items: center">
                <h4>Emails supprimés</h4>
                <div id="email_supp" style="width:300px;height: 350px;overflow: scroll">
                    
                    <?php
                    foreach ($invalidEmails as $email) {

                        echo "$email  "."<br>";

                    }
                    saveInvalidEmails($invalidEmails);
                    ?>
                </div>
                <a href="./NonValidMails.txt" download>Telecharger le fichier des emails supprimés</a>            </div>
        </div>
        <br>
        <h2>Q2: Tous les addresses emails et leurs frequences</h2>
        <br>

        <?php
        $emails = file('./Emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $n = 0;
        if (isset($emails)) {
            $invalidEmails = [];
        
            foreach ($emails as $email) {
                $status = validateEmail($email) ? "<td style='color:green;'>Valid</td>" : "<td style='color:red;'>Invalid</td>";
                echo "
                <tr>
                    <td>Email $n :" . $email . "</td>
                    " . $status . "
                    <td>" . array_count_values($emails)[$email] . "</td>
                </tr>";
        
                $n += 1;
        
                if (!validateEmail($email)) {
                    $invalidEmails[] = $email;
                }
            }
            saveInvalidEmails($invalidEmails);
        }
        ?>
        </tbody>
    </table>
    <h2>Q3: Suppression des doublons et Tri </h2>
    
    <table class="table">
        <!-- Table header -->
        <thead>
        <tr>
            <th>Emails</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $emails = removeDuplicates($emails);

        $unique_emails_content = implode(PHP_EOL, $emails);
        file_put_contents('EmailsT.txt', $unique_emails_content);
$n=0;
        foreach ($emails as $email) {
            $status = validateEmail($email) ? "<td style='color:green;'>Valid</td>" : "<td style='color:red;'>Invalid</td>";
            echo "
            <tr>
                <td>Email $n :" . $email . "</td>
                " . $status . "
            </tr>";
            $n += 1;
        }
        ?>
        </tbody>
    </table>
    <a href="./EmailsT.txt" download>Telecharger le fichier des emails Sans doublons et Triés</a>
    <br><br><br>
    <h2>Q4: Formulaire d'ajout des emails </h2>
    <br>

    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Email doit être au format abc@example.com">
        <button type="submit">Add Email</button>
    </form>

    <?php

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $emails = file('./Emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!in_array($email, $emails)) {
            if (validateEmail($email)) {
                file_put_contents('Emails.txt', "\n".$email . PHP_EOL, FILE_APPEND);
                echo "<script>location.reload();</script>";
            } else {
                echo "<script>alert('Invalid Email');</script>";
            }
        } else {
            echo "<script>alert('Email already exists');</script>";
        }
        unset($_POST['email']);
    }
    ?>
</div>
<br><br><br><br><br><br><br><br>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
