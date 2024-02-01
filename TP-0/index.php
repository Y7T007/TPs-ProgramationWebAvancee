<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TP - 0</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>


<?php 

// Dans ce cas j'ai utilise 3 criteres pour valider un email:
    // 1. Verifier si l'email est vide
    // 2. Verifier si l'email est valide
    // 3. Verifier si le domaine de l'email existe

    function validateEmail($email) {
        if (empty($email)) {
            return false;
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        
        $domain = explode('@', $email)[1];
        if (!checkdnsrr($domain, 'MX')) {
            return false;
        }
        
        return true;
    }
    
?>
<body>
    <div class="table-responsive">
        <table class="table">
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
                $n=0;
                if (isset($emails)){
                    foreach($emails as $email){
                        validateEmail($email)? $status = "<td color= 'green'>Valid</td>" : $status = "<td color= 'green'>Valid</td>";
                        echo " 
                        <tr>
                            <td>Email $n :".$email."</td>
                            ".$status."
                            <td>fre</td>
                        </tr>";
                        $n+=1;
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
