<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TP - 0</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

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
                        echo " 
                        <tr>
                            <td>Email $n :".$email."</td>
                            <td>Status</td>
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
