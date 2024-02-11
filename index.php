<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - gggggg</title>
    <meta name="description" content="gf">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-table.css">
    <link rel="stylesheet" href="assets/css/Table-with-search.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
    <nav class="navbar navbar-expand-md fixed-top navbar-light" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#">Tp-0</a><button data-bs-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-bs-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item nav-link"></li>
                    <li class="nav-item nav-link"></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#contact">Yassir WAHID (y7t007)</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image:url('intro-bg.jpg');">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">Traitement des emails</h1>
                        <p class="intro-text">Le but de ce TP est de réaliser un programme permettant la gestion des emails stockés dans un&nbsp;fichier Emails.txt :</p><a class="btn btn-link btn-circle" role="button" href="#about"><i class="fa fa-angle-double-down animated"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="text-center content-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Selection de fichier</h2>
                    <p>Importer un nouveau fichier texte contenant les emails :</p>
                    <p style="font-style: italic;">(Si aucun fichier n'a ete importer le fichier Emails.txt par defaut sera charger)</p>
                    <div class="custom-file" style="padding: 23px;background: var(--bs-body-color);margin: 29px;border-radius: 18px;"><input type="file" class="custom-file-input" name="file" id="file" onchange="displayFileContent(this)"><label class="form-label custom-file-label">Upload File</label></div><div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">

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
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th class="col-md-5 col-xs-5">Emails</th>

    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td  id="file-content"></td>

    </tr>

  </tbody>
</table>
                    <p></p>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center download-section content-section" id="download" style="background-image:url('downloads-bg.jpg');">
        <div class="container">
            <div class="col-lg-8 mx-auto">
                <h1>Q1: Suppression des emails invalides</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width: 445px;margin: auto;">
                    <p>Nouveau contenu</p>
                    <div class="table-responsive" style="border-radius: 20px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Emails</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                        $emails = file('./Emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                        if (isset($emails)) {
                                            $invalidEmails = [];
                                            $validEmails = [];
                                            foreach ($emails as $email) {
                                                if(validateEmail($email) ){ echo( "$email "."<br>");}
                                                $validEmails[] = $email;

                                                if (!validateEmail($email)) {
                                                    $invalidEmails[] = $email;
                                                }
                                            }
                                            $validEmailsText = implode(PHP_EOL, $validEmails);
                                            file_put_contents('Emails.txt', $validEmailsText);
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><a class="btn btn-primary btn-lg btn-default" type="a" href="Emails.txt" download><i class="fa fa-download fa-fw"></i>&nbsp;Download<span class="network-name"></span></a>
                </div>
                <div class="col-md-6" style="width: 445px;margin: auto;">
                    <p>Emails supprimés</p>
                    <div class="table-responsive" style="border-radius: 20px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Emails</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                        foreach ($invalidEmails as $email) {

                                            echo "$email  "."<br>";

                                        }
                                        saveInvalidEmails($invalidEmails);
                                        ?>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><a class="btn btn-primary btn-lg btn-default" type="a" href="NonValidMails.txt" download><i class="fa fa-download fa-fw"></i><span class="network-name">&nbsp;DOWNLOAD</span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center content-section" id="contact">
        <section class="text-center content-section" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1>Q2: Tous les addresses emails et leurs frequences</h1>
                        <p></p>
                        <div class="row">
                            <div class="col-md-6" style="width: 445px;margin: auto;">
                                <div class="table-responsive" style="border-radius: 20px;">
                                    <table class="table">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <section class="text-center download-section content-section" id="download-1" style="background-image:url('downloads-bg.jpg');">
                        <div class="container">
                            <div class="col-lg-8 mx-auto">
                                <h1>Q3: Suppression des doublons et Tri</h1>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6" style="width: 445px;margin: auto;">
                                    <div class="table-responsive" style="border-radius: 20px;">
                                        <table class="table">
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
                                    </div><a class="btn btn-primary btn-lg btn-default" type="a" href="EmailsT.txt" download><i class="fa fa-download fa-fw"></i><span class="network-name">&nbsp;DOWNLOAD</span></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto" style="margin-top: 113px;">
                    <h2 style="margin: 53px;">Q4: Formulaire d'ajout des emails</h2>
                    <form method="POST" action="">

                        <input type="email" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Email doit être au format abc@example.com"  style="padding: 12px;margin-top: -5px;border-radius: 12px;width: 262.8px;" placeholder="Email@example.com" >
                        <input class="btn btn-primary" type="submit" style="padding: 12px;margin-top: -4px;margin-left: 26px;border-radius: 16px;" value="Envoyer">
                        <ul class="list-inline banner-social-buttons"></ul>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <div class="map-clean"></div>
    <footer>
        <div class="container text-center">
            <p>Copyright ©&nbsp;YASSIR WAHID 2024</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="assets/js/Table-with-search-table.js"></script>
</body>

</html>

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
