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
        echo "DNS invalid de ce mail : $email";
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
    <h1>Q0 : afficher tous les emails dans le fichier Emails.txt</h1>
    <table class="table">
        <!-- Table header for Q0 -->
        <thead>
        <tr>
            <th>File: Emails.txt</th>
            <th>Status</th>
            <th>Frequency</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $emails = file('./Emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $n = 0;
        if (isset($emails)) {
            $invalidEmails = []; // Array to store invalid emails
        
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
                    $invalidEmails[] = $email; // Add invalid email to the array
                }
            }
            saveInvalidEmails($invalidEmails);
        }
        ?>
        </tbody>
    </table>

    <center>
        <h1>Q1 : supprimer les doublons de la liste des emails</h1>
    </center>
    <table class="table">
        <!-- Table header for Q1 -->
        <thead>
        <tr>
            <th>File: Emails.txt</th>
            <th>Status</th>
            <th>Frequency</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Get counts of each email
        $emailCounts = array_count_values($emails);
        foreach ($emails as $email) {
            $status = validateEmail($email) ? "<td style='color:green;'>Valid</td>" : "<td style='color:red;'>Invalid</td>";
            if (validateEmail($email) && $emailCounts[$email] > 1) {
                echo "
                        <tr>
                            <td>Email $n :" . $email . "</td>
                            " . $status . "
                            <td>" . $emailCounts[$email] . "</td>
                        </tr>";
            };
            $n += 1;
        }
        ?>
        <?php


        // Remove duplicates and update Emails.txt
        $emails = removeDuplicates($emails);
        ?>
        </tbody>
    </table>

    <!-- Form for adding new email -->
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Email doit être au format abc@example.com">
        <button type="submit">Add Email</button>
    </form>

    <?php
    // Handle form submission
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $emails = file('./Emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!in_array($email, $emails)) {
            if (validateEmail($email)) {
                file_put_contents('Emails.txt', $email . PHP_EOL, FILE_APPEND);
                echo "<script>location.reload();</script>";
            } else {
                echo "<script>alert('Invalid Email');</script>";
            }
        } else {
            echo "<script>alert('Email already exists');</script>";
        }
    }
    ?>
</div>
<br><br><br><br><br><br><br><br>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
