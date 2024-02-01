<?php
$emails = array(file_get_contents('Emails.txt'));

if (isset($emails)){
    foreach($emails as $email){
        echo $email;
    }
}

// if (isset($emails)){
//     foreach($emails as $email){
//         echo $email;
//     }
// }
